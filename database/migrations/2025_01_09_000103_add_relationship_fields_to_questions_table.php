<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToQuestionsTable extends Migration
{
    public function up()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->unsignedBigInteger('test_id')->nullable();
            $table->foreign('test_id', 'test_fk_10374753')->references('id')->on('tests');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_10374792')->references('id')->on('teams');
        });
    }
}
