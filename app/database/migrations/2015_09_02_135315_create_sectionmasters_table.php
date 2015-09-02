<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionmastersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sectionmasters', function($table)
	    {
	    	/*
	    	・スキーマビルダで作るカラムはNotNullが標準（NULL許容の場合はnullable()を呼び出す）
	    	*/
	        $table->integer('sectioncd')->primary();
	        $table->text('sectionname');
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
		Schema::drop('sectionmasters');
	}

}
