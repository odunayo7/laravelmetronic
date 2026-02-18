<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToIncomeSourcesTable extends Migration
{
    public function up()
    {
        Schema::table('income_sources', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_10374808')->references('id')->on('teams');
        });
    }
}
