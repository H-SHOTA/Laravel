@extends('layout')

@section('header')
	<head>
		{{HTML::style('style.css')}}
	</head>
@stop

@section('content')
	<div class='ctrlArea'>
	<h1>エラー</h1>
    @foreach($list as $data)
    	<h3>100:入力必須項目に値が入力されていません({{$data}})<br></h3>
    @endforeach	
        	<input type="button"value="戻る" onclick="location.href='edit/'" />
    </div>
@stop