<?php

class UserController extends BaseController {

	protected function index()
	{
		$users = DB::table('usermasters')
				->join('departmentmasters', 'usermasters.departmentcd', '=', 'departmentmasters.departmentcd')
				->join('sectionmasters', 'sectionmasters.sectioncd', '=', 'departmentmasters.sectioncd')
				->select('usermasters.familyname as familyname', 'usermasters.firstname as firstname', 
				         'sectionmasters.sectionname as sectionname', 
				         'departmentmasters.departmentname as departmentname',
				         'usermasters.mailaddress as mailaddress',
				         'usermasters.deleteflg as deleteflg')
				->get();
	    return View::make('top')->with('Users', $users);		
	}

}
