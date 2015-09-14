@extends('layout')


@section('content')
    <div id="ctrlArea" >
        <form method='post' action='/'>
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
        <input type="button" value="新規登録" onclick="location.href='/'">
	</div>
    <br>
    <table>
		<tr class="tableHeader">
			<th>名前</th>
			<th>所属</th>
			<th>メールアドレス</th>
			<th>削除フラグ</th>
		</tr>
    @foreach($Users as $User)
        <tr>
        	<th>{{$User->familyname}} {{$User->firstname}}</th>
        	<th>{{$User->sectionname}} {{$User->departmentname}}</th>
        	<th>{{$User->mailaddress}}</th>
        	<th>
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