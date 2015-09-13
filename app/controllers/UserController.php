<?php

class UserController extends BaseController {

	private function _getDepartmentList()
	{
		if (Cache::has('departmentList')) 
		{
			return Cache::get('departmentList');
		} 
		else 
		{
			$list = DB::table('sectionmasters')
					 ->join('departmentmasters', 'departmentmasters.sectioncd', '=', 'sectionmasters.sectioncd')
					 ->select('sectionmasters.sectionname as sectionname', 'departmentmasters.departmentname as departmentname')
					 ->get();
			$expiresAt = Carbon::now()->addMinutes(10);
			Cache::add('departmentList', $list, $expiresAt);
			return $list;
		}
	}

	public function getIndex()
	{
		$departments = $this->_getDepartmentList();
		$users = DB::table('usermasters')
				->join('departmentmasters', 'usermasters.departmentcd', '=', 'departmentmasters.departmentcd')
				->join('sectionmasters', 'sectionmasters.sectioncd', '=', 'departmentmasters.sectioncd')
				->select('usermasters.familyname as familyname', 'usermasters.firstname as firstname', 
				         'sectionmasters.sectionname as sectionname', 
				         'departmentmasters.departmentname as departmentname',
				         'usermasters.mailaddress as mailaddress',
				         'usermasters.deleteflg as deleteflg')
				->get();
	    return View::make('top', 
	                      array('Users' => $users, 'title' => 'ユーザー管理TOP', 'departments' => $departments));		
	}

	public function postSearch()
	{
		$postdata = Input::get('department');
		$list = explode('/', $postdata);
		
		$departments = $this->_getDepartmentList();
		$users = DB::table('usermasters')
				->join('departmentmasters', 'usermasters.departmentcd', '=', 'departmentmasters.departmentcd')
				->join('sectionmasters', 'sectionmasters.sectioncd', '=', 'departmentmasters.sectioncd')
				->select('usermasters.familyname as familyname', 'usermasters.firstname as firstname', 
				         'sectionmasters.sectionname as sectionname', 
				         'departmentmasters.departmentname as departmentname',
				         'usermasters.mailaddress as mailaddress',
				         'usermasters.deleteflg as deleteflg')
				->where('sectionname', '=', $list[0])
				->where('departmentname', '=', $list[1])
				->get();
	    return View::make('top', 
	                      array('Users' => $users, 'title' => 'ユーザー管理TOP', 'departments' => $departments));
	}
}
