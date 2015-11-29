<?php

class EditController extends BaseController 
{
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

	public function postRegister()
	{
	    return 'hogeIndex!';
	}

	public function getIndex()
	{
		$departments = $this->_getDepartmentList();

	    return View::make('edit', array('title' => 'ユーザー情報登録', 'departments' => $departments));	
	}

	public function postIndex()
	{
		var_dump(Input::all());
	    return View::make('confirm', 
	                      array( 'user' => Input::all(),
	                            'title' => 'ユーザー登録確認', 
	                            ));
	}

}
