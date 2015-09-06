@extends('layout')


@section('content')
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