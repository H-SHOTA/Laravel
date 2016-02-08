<?php

class EditController extends BaseController 
{
	public function postRegister()
	{
		$postdata = Input::get('department');
		$list = explode('/', $postdata);
		$depAndSecCd = $this->_getDepartmentAndSectionCd($list[0], $list[1]);
		if(Input::has('update')){
			DB::table('usermasters')
				->where('uid', Input::get('uid'))
				->update(
					array(
						'departmentcd' => $depAndSecCd[0],
						'familyname' => Input::get('sei'),
						'firstname' => Input::get('mei'),
						'familykana' => Input::get('seiKana'),
						'firstkana' => Input::get('meiKana'),
						'mailaddress' => Input::get('mailaddress'),
						'deleteflg' => ((Input::get('delete') === 'nodelete')? 0 : 1),
						'lastupdate' => Carbon::now(),
					)
				);
		}
		else 
		{
			DB::table('usermasters')->insert(
				array(
					'uid' => DB::table('usermasters')->max('uid') + 1,
					'departmentcd' => $depAndSecCd[0],
					'familyname' => Input::get('sei'),
					'firstname' => Input::get('mei'),
					'familykana' => Input::get('seiKana'),
					'firstkana' => Input::get('meiKana'),
					'mailaddress' => Input::get('mailaddress'),
					'deleteflg' => ((Input::get('delete') === 'nodelete')? 0 : 1),
					'insdate' => Carbon::now(),
					'lastupdate' => Carbon::now(),
					)
				);
		}
	    return View::make('confirm', 
	                      array( 'user' => Input::all(),
	                            'title' => 'ユーザー登録完了', 
	                            'complete' => ''
	                            ));
	}

	public function getIndex()
	{
		$departments = $this->_getDepartmentList();

	    return View::make('edit', array('title' => 'ユーザー情報登録', 'departments' => $departments));	
	}

	public function postIndex()
	{
	    return View::make('confirm', 
	                      array( 'user' => Input::all(),
	                            'title' => 'ユーザー登録確認', 
	                            ));
	}

	public function getUpdate()
	{
		$user = DB::table('usermasters')->where('uid', Input::get('uid'))->first();
		$departments = $this->_getDepartmentList();
		return  View::make('edit', array('title' => 'ユーザー情報編集', 'user' => $user,'departments' => $departments));	
	}
}
