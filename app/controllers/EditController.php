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

	private function _getDepartmentAndSectionCd($sectionname, $departmentName)
	{
		$department = DB::table('departmentmasters')
			->join('sectionmasters', 'departmentmasters.sectioncd', '=', 'sectionmasters.sectioncd')
			->where('sectionname', $sectionname)
			->where('departmentname', $departmentName)
			->first();
		return array($department->sectioncd,$department->departmentcd);
	}

	public function postRegister()
	{
		var_dump(Input::all());

		$postdata = Input::get('department');
		$list = explode('/', $postdata);
		$depAndSecCd = $this->_getDepartmentAndSectionCd($list[0], $list[1]);

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

	    return View::make('confirm', 
	                      array( 'user' => Input::all(),
	                            'title' => 'ユーザー登録完了', 
	                            ));
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
