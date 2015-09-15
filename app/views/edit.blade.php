@extends('layout')

@section('header')
	<head>
		{{HTML::style('style.css')}}
	</head>
@stop

@section('content')
	<div class="ctrlArea" >
    <form method='post' action='/edit'>	
    	<table  class='tableAlign'> 
    		<tr class='useredit'>
    			<th class='useredit'>名前：</th>
    			<th class='useredit'><input type='textbox' name='sei'/></th>
    			<th class='useredit'><input type='textbox' name='mei'/></th>
    		</tr>
    		<tr class='useredit'>
    			<th class='useredit'>カナ：</th>
    			<th class='useredit'><input type='textbox' name='seiKana'/></th>
    			<th class='useredit'><input type='textbox' name='meiKana'/></th>
    		</tr>
    		<tr class='useredit'>
    			<th class='useredit'>所属：</th>
    			<th class='useredit' colspan="2">
		            <select name="department" class='departmentSelect'>
		        @foreach($departments as $department)
		                <option value='{{$department->sectionname}}/{{$department->departmentname}}'>
		                    {{$department->sectionname}}{{$department->departmentname}}
		                </option>
		        @endforeach
		            </select>
    			</th>
    		</tr>
    		<tr class='useredit'>
    			<th class='useredit'>メールアドレス：</th>
    			<th class='useredit' colspan="2">
    				<input type='textbox' class='mailaddressBox' name='mailaddress'/>
    			</th>
    		</tr>
    		<tr class='useredit'>
    			<th class='useredit'>削除フラグ：</th>
    			<th class='useredit' colspan="2">
					<input type="radio" name="deleteflg" value="nodelete" checked> 未削除
					<input type="radio" name="deleteflg" value="deleted"> 削除済み
    			</th>
    		</tr>
    		<tr>
    			<th colspan="3" class='registBtn'>
    				<input type="submit" value="登録">
    			</th>
    		</tr>
    	</table><br>
    	</form>
	</div>
@stop