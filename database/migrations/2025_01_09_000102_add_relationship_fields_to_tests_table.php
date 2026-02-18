<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTestsTable extends Migration
{
    public function up()
    {
        Schema::table('tests', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id')->nullable();
            $table->foreign('course_id', 'course_fk_10374744')->references('id')->on('courses');
            $table->unsignedBigInteger('lesson_id')->nullable();
            $table->foreign('lesson_id', 'lesson_fk_10374745')->references('id')->on('lessons');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_10374791')->references('id')->on('teams');
        });
    }
}
