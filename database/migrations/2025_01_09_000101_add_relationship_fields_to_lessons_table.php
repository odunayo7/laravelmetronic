<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToLessonsTable extends Migration
{
    public function up()
    {
        Schema::table('lessons', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id')->nullable();
            $table->foreign('course_id', 'course_fk_10374731')->references('id')->on('courses');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_10374790')->references('id')->on('teams');
        });
    }
}
