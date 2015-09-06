@extends('layout')


@section('content')
	<table>
		<tr class="tableHeader">
			<th>名前</th>
			<th>所属</th>
			<th>メールアドレス</th>
			<th>削除フラグ</th>
		</tr>
    @foreach($Departments as $Department)
        <tr>
        	<th>{{$Department->departmentcd}}</th>
        	<th>{{$Department->sectioncd}}</th>
        	<th>{{$Department->departmentname}}</th>
        	<th>{{$Department->departmentname}}</th>
    	</tr>
    @endforeach
	</table>
@stop

@section('header')
	<head>
		{{HTML::style('style.css')}}
	</head>
@stop