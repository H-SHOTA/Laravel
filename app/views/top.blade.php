@extends('layout')


@section('content')
    <div class="ctrlArea" >
        <form method='post' action='/top'>
            <select name = "department">
                <option value=""></option>
        @foreach($departments as $department)
                <option value='{{$department->sectionname}}/{{$department->departmentname}}'>
                    {{$department->sectionname}}{{$department->departmentname}}
                </option>
        @endforeach
            </select>
            <input type="submit" value="検索"><br>
            <input type="hidden" name="containDlt" value='off'/>
            <input type="checkbox" name="containDlt">削除済みを含める</input>
        </form>
        <input type="button" value="新規登録" onclick="location.href='edit/'">
	</div>
    <br>
    <table class='tableAlign'>
		<tr class="tableHeader userlist">
			<th class='userlist'>名前</th>
			<th class='userlist'>所属</th>
			<th class='userlist'>メールアドレス</th>
			<th class='userlist'>削除フラグ</th>
		</tr>
    @foreach($Users as $User)
        <tr class="userlist">
        	<th class='userlist'><a href="/edit/update?uid={{$User->uid}}">{{$User->familyname}} {{$User->firstname}}</a></th>
        	<th class='userlist'>{{$User->sectionname}} {{$User->departmentname}}</th>
        	<th class='userlist'>{{$User->mailaddress}}</th>
        	<th class='userlist'>
        		@if ($User->deleteflg === 0)
        			未削除
        		@else
        			削除済み
        		@endif
        	</th>
    	</tr>
    @endforeach
	</table>
@stop

@section('header')
	<head>
		{{HTML::style('style.css')}}
	</head>
@stop