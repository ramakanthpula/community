<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToFloorsTable extends Migration
{
    public function up()
    {
        Schema::table('floors', function (Blueprint $table) {
            $table->unsignedBigInteger('block_name_id');
            $table->foreign('block_name_id', 'block_name_fk_3626342')->references('id')->on('blocks');
        });
    }
}
