<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCurrenciesTable extends Migration
{
    public function up()
    {
        Schema::table('currencies', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_10374810')->references('id')->on('teams');
        });
    }
}
