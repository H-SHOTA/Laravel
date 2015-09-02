<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentmastersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('departmentmasters', function($table)
	    {
	    	/*
	    	・スキーマビルダで作るカラムはNotNullが標準（NULL許容の場合はnullable()を呼び出す）
	    	*/
	        $table->integer('departmentcd')->primary();
	        $table->integer('sectioncd');
	        $table->text('departmentname')->nullable();
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
		Schema::drop('departmentmasters');
	}

}
