<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
// 基本のGETルート
/*
Route::get('/', function()
{
	
	$users = DB::table('usermasters')
			->join('departmentmasters', 'usermasters.departmentcd', '=', 'departmentmasters.departmentcd')
			->join('sectionmasters', 'sectionmasters.sectioncd', '=', 'departmentmasters.sectioncd')
			->select('usermasters.familyname as familyname', 'usermasters.firstname as firstname', 
			         'sectionmasters.sectionname as sectionname', 
			         'departmentmasters.departmentname as departmentname',
			         'usermasters.mailaddress as mailaddress',
			         'usermasters.deleteflg as deleteflg')
			->get();z
    return View::make('top')->with('Users', $users);
    

});
*/
Route::controller('/', 'UserController');

