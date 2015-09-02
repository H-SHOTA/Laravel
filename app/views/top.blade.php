@extends('layout')


@section('content')
    @foreach($Departments as $Department)
        <p>　{{$Department->departmentcd}}:
        	{{$Department->sectioncd}}:
        	{{$Department->departmentname}}</p>
    @endforeach
@stop

@section('header')
	<head>
		{{HTML::style('style.css')}}
	</head>
@stop