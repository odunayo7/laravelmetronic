<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToContentPagesTable extends Migration
{
    public function up()
    {
        Schema::table('content_pages', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_10374817')->references('id')->on('teams');
        });
    }
}
