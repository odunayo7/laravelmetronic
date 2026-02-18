<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAssetsHistoriesTable extends Migration
{
    public function up()
    {
        Schema::table('assets_histories', function (Blueprint $table) {
            $table->unsignedBigInteger('asset_id')->nullable();
            $table->foreign('asset_id', 'asset_fk_10374514')->references('id')->on('assets');
            $table->unsignedBigInteger('status_id')->nullable();
            $table->foreign('status_id', 'status_fk_10374515')->references('id')->on('asset_statuses');
            $table->unsignedBigInteger('location_id')->nullable();
            $table->foreign('location_id', 'location_fk_10374516')->references('id')->on('asset_locations');
            $table->unsignedBigInteger('assigned_user_id')->nullable();
            $table->foreign('assigned_user_id', 'assigned_user_fk_10374517')->references('id')->on('users');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_10374823')->references('id')->on('teams');
        });
    }
}
