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
Route::get('/', function()
{
	$Departments = Departmentmaster::all();
    return View::make('top')->with('Departments', $Departments);
});
