<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClassroomsTable extends Migration {

	public function up()
	{
		Schema::create('Classrooms', function(Blueprint $table) {
			$table->id();
			$table->string('Name_class');
			$table->unsignedBigInteger('Grade_id');
            $table->foreign('Grade_id')->references('id')->on('Grades');

			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('Classrooms');
	}
}
