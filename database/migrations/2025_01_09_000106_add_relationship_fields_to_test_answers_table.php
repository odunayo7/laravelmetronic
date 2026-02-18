<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTestAnswersTable extends Migration
{
    public function up()
    {
        Schema::table('test_answers', function (Blueprint $table) {
            $table->unsignedBigInteger('test_result_id')->nullable();
            $table->foreign('test_result_id', 'test_result_fk_10374775')->references('id')->on('test_results');
            $table->unsignedBigInteger('question_id')->nullable();
            $table->foreign('question_id', 'question_fk_10374776')->references('id')->on('questions');
            $table->unsignedBigInteger('option_id')->nullable();
            $table->foreign('option_id', 'option_fk_10374777')->references('id')->on('question_options');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_10374795')->references('id')->on('teams');
        });
    }
}
