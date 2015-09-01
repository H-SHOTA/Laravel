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
	//$url = URL::to('foo');
	// display 'http://localhost:8000/foo'
	//var_dump($url);
    //return 'Hello Root!';
    return URL::route(‘profile’);;
});
// 基本のPOSTルート
Route::post('foo/bar', function()
{
    return 'Hello foo/bar';
});
// 複数のHTTP動詞に対応するルートの登録
Route::match(array('GET', 'POST'), '/match', function()
{
    return 'Hello match';
});

// ルートパラメーター
Route::get('id/{id}', function($id)
{
    return 'id '.$id;
});

// オプションのルートパラメーター
Route::get('user/{name?}', function($name = 'ほげえええええええええええ！！')
{
    return $name;
});

// 正規表現によるルートの束縛
Route::get('regex/{name}', function($name)
{
    //
    return 'name:' . $name;
})
->where('name', '[A-Za-z]+');

Route::get('regex/{id}', function($id)
{
    //
    return 'id:' . $id;
})
->where('id', '[0-9]+');

// ルートフィルター
Route::get('nenrei/{age?}', array('before' => 'old', function($age = 0)
{
    return 'You are over 200 years old!';
}));

Route::filter('old', function()
{
    if (Route::input('age') < 200)
    {
    	return 'You are not over 200 years old!';
    }
});
