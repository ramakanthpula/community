<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUnitsTable extends Migration
{
    public function up()
    {
        Schema::table('units', function (Blueprint $table) {
            $table->unsignedBigInteger('block_name_id')->nullable();
            $table->foreign('block_name_id', 'block_name_fk_3626424')->references('id')->on('blocks');
            $table->unsignedBigInteger('floor_name_id')->nullable();
            $table->foreign('floor_name_id', 'floor_name_fk_3626425')->references('id')->on('floors');
        });
    }
}
