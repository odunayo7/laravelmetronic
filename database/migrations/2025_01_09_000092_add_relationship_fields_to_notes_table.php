<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToNotesTable extends Migration
{
    public function up()
    {
        Schema::table('notes', function (Blueprint $table) {
            $table->unsignedBigInteger('project_id')->nullable();
            $table->foreign('project_id', 'project_fk_10374656')->references('id')->on('projects');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_10374803')->references('id')->on('teams');
        });
    }
}
