<?php

class EditFilter {

	public function filter()
	{
		$isError = false;
		if(Input::method() === 'POST')
		{
			$data = array();
			if(empty(Input::get('sei')) || empty(Input::get('mei')) )
			{
				array_push($data, '名前');
				$isError = true;
			}
			if(empty(Input::get('seiKana')) || empty(Input::get('meiKana')) )
			{
				array_push($data, 'カナ');
				$isError = true;
			}
			if(empty(Input::get('mailaddress')))
			{
				array_push($data, 'メールアドレス');
				$isError = true;
			}
			if($isError)
			{
				return View::make('error', array('title' => 'ユーザー情報登録', 'list' => $data));
			}
		}

	}

}