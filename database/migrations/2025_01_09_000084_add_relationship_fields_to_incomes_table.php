<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToIncomesTable extends Migration
{
    public function up()
    {
        Schema::table('incomes', function (Blueprint $table) {
            $table->unsignedBigInteger('income_category_id')->nullable();
            $table->foreign('income_category_id', 'income_category_fk_10374597')->references('id')->on('income_categories');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_10374811')->references('id')->on('teams');
        });
    }
}
