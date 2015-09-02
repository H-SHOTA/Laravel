<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsermastersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('usermasters', function($table)
	    {
	        $table->integer('uid')->primary();
	        $table->integer('departmentcd')->nullable();
	        $table->text('familyname');
	        $table->text('firstname')->nullable();
	        $table->text('familykana')->nullable();
	        $table->text('firstkana')->nullable();
	        $table->text('mailaddress')->nullable();
	        $table->integer('deleteflg');
	        $table->date('insdate');
	        $table->timestamp('lastupdate');
	    });	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('usermasters');
	}

}
