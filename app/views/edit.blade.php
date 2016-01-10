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
    			<th class='useredit'>
                    <input type='textbox' 
                           name='sei' 
                           value=' {{{ isset($user->familyname) ? $user->familyname : '' }}}'/>
                </th>
    			<th class='useredit'>
                    <input 
                        type='textbox' 
                        name='mei' 
                        value=' {{{ isset($user->firstname) ? $user->firstname : '' }}}'/>
                </th>
    		</tr>
    		<tr class='useredit'>
    			<th class='useredit'>カナ：</th>
    			<th class='useredit'>
                    <input 
                        type='textbox' 
                        name='seiKana' 
                        value=' {{{ isset($user->familykana) ? $user->familykana : '' }}}'/>
                </th>
    			<th class='useredit'>
                    <input 
                        type='textbox' 
                        name='meiKana' 
                        value=' {{{ isset($user->firstkana) ? $user->firstkana : '' }}}'/>
                </th>
    		</tr>
    		<tr class='useredit'>
    			<th class='useredit'>所属：</th>
    			<th class='useredit' colspan="2">
		            <select name="department" class='departmentSelect'>
		        @foreach($departments as $department)
		                <option 
                            value='{{$department->sectionname}}/{{$department->departmentname}}'
                            @if(isset($user))
                                {{{ ($department->departmentcd == $user->departmentcd)? 'selected' : '' }}}
                            @endif
                            >
		                    {{$department->sectionname}}{{$department->departmentname}}
		                </option>
		        @endforeach
		            </select>
    			</th>
    		</tr>
    		<tr class='useredit'>
    			<th class='useredit'>メールアドレス：</th>
    			<th class='useredit' colspan="2">
                    <input 
                        type='textbox' 
                        name='mailaddress' 
                        class='mailaddressBox'
                        value=' {{{ isset($user->mailaddress) ? $user->mailaddress : '' }}}'/>
    			</th>
    		</tr>
    		<tr class='useredit'>
    			<th class='useredit'>削除フラグ：</th>
    			<th class='useredit' colspan="2">
					<input type="radio" name="deleteflg" value="nodelete" 
                    @if(isset($user))
                        {{{($user->deleteflg == 0)? 'checked' : ''}}}
                    @endif> 未削除
					<input type="radio" name="deleteflg" value="deleted"
                    @if(isset($user))
                        {{{($user->deleteflg == 1)? 'checked' : ''}}}
                    @endif> 削除済み
    			</th>
    		</tr>
    		<tr>
    			<th colspan="3" class='registBtn'>
    				<input type="submit" value="登録">
    			</th>
    		</tr>
    	</table><br>
        @if(isset($user))
            <input type='hidden' name='update' value="update"/>
            <input type='hidden' name='uid' value="{{$user->uid}}"/>
        @endif
    	</form>
	</div>
@stop