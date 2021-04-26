<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAllotUnitsTable extends Migration
{
    public function up()
    {
        Schema::table('allot_units', function (Blueprint $table) {
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id', 'users_fk_3715620')->references('id')->on('users');
            $table->unsignedBigInteger('units_id');
            $table->foreign('units_id', 'units_fk_3715621')->references('id')->on('units');
        });
    }
}
