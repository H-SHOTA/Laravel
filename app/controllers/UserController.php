<?php

class UserController extends BaseController {
	private function _getUserList()
	{
		return DB::table('usermasters')
			->join('departmentmasters', 'usermasters.departmentcd', '=', 'departmentmasters.departmentcd')
			->join('sectionmasters', 'sectionmasters.sectioncd', '=', 'departmentmasters.sectioncd')
			->select('usermasters.uid as uid',
					 'usermasters.familyname as familyname', 'usermasters.firstname as firstname', 
			         'sectionmasters.sectionname as sectionname', 
			         'departmentmasters.departmentname as departmentname',
			         'usermasters.mailaddress as mailaddress',
			         'usermasters.deleteflg as deleteflg');	
	}

	public function getIndex()
	{
		$departments = $this->_getDepartmentList();
		$users = $this->_getUserList()->get();
	    return View::make('top', 
	                      array('Users' => $users, 
	                            'title' => 'ユーザー管理TOP', 
	                            'departments' => $departments));		
	}

	public function postIndex()
	{
		$postdata = Input::get('department');
		$list = explode('/', $postdata);

		$departments = $this->_getDepartmentList();
		$queryResult = $this->_getUserList();
		if(count($list) == 2)
		{
			$queryResult = $queryResult
						->where('sectionname', '=', $list[0])
						->where('departmentname', '=', $list[1]);
	    }
	    
	    if(Input::get('containDlt') == 'off')
	    {
	    	$queryResult = $queryResult->where('deleteflg', '=', 0);
	    }

	    $users = $queryResult->get();
	    return View::make('top', 
	                      array('Users' => $users, 
	                            'title' => 'ユーザー管理TOP', 
	                            'departments' => $departments));
	}
}
