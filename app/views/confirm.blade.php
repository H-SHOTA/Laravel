@extends('layout')

@section('header')
	<head>
		{{HTML::style('style.css')}}
	</head>
@stop

@section('content')
    <div class="ctrlArea" >
    @if(!isset($complete))
    <form method='post' action='/edit/register'> 
    @else
    <form method='get' action='/'> 
    @endif
        <table  class='tableAlign'> 
            <tr class='useredit'>
                <th class='useredit'>名前：</th>
                <th class='useredit'>{{$user['sei']}}</th><input type='hidden' name='sei' value="{{$user['sei']}}"/>
                <th class='useredit'>{{$user['mei']}}</th><input type='hidden' name='mei' value="{{$user['mei']}}"/>
            </tr>
            <tr class='useredit'>
                <th class='useredit'>カナ：</th>
                <th class='useredit'>{{$user['seiKana']}}</th><input type='hidden' name='seiKana' value="{{$user['seiKana']}}"/>
                <th class='useredit'>{{$user['meiKana']}}</th><input type='hidden' name='meiKana' value="{{$user['meiKana']}}"/>
            </tr>
            <tr class='useredit'>
                <th class='useredit'>所属：</th>
                <th class='useredit' colspan="2">{{$user['department']}}</th>
                <input type='hidden' name='department' value="{{$user['department']}}"/>
            </tr>
            <tr class='useredit'>
                <th class='useredit'>メールアドレス：</th>
                <th class='useredit' colspan="2">{{$user['mailaddress']}}</th>
                <input type='hidden' name='mailaddress' value="{{$user['mailaddress']}}"/>
            </tr>
            <tr class='useredit'>
                <th class='useredit'>削除フラグ：</th>
                    @if ($user['deleteflg'] === 'delete')
                        <th class='useredit' colspan="1">削除済み</th>
                    @else
                        <th class='useredit' colspan="1">未削除</th>
                    @endif
                    <input type='hidden' name='deleteflg' value="{{$user['deleteflg']}}"/>
            </tr>
            <tr>
                <th colspan="3" class='registBtn'>
                    @if(!isset($complete))
                        <input type="submit" value="登録">
                    @else
                        <input type="submit" value="戻る">
                    @endif
                </th>
            </tr>
        </table><br>
        @if(isset($user['update']))
            <input type='hidden' name='update' value="update"/>
            <input type='hidden' name='uid' value="{{$user['uid']}}"/>
        @endif
        </form>
    </div>
@stop