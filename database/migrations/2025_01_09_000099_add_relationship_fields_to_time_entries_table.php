<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTimeEntriesTable extends Migration
{
    public function up()
    {
        Schema::table('time_entries', function (Blueprint $table) {
            $table->unsignedBigInteger('work_type_id')->nullable();
            $table->foreign('work_type_id', 'work_type_fk_10374712')->references('id')->on('time_work_types');
            $table->unsignedBigInteger('project_id')->nullable();
            $table->foreign('project_id', 'project_fk_10374713')->references('id')->on('time_projects');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_10374798')->references('id')->on('teams');
        });
    }
}
