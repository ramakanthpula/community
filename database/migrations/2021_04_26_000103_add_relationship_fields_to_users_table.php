<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_3626088')->references('id')->on('teams');
            $table->unsignedBigInteger('block_name_id')->nullable();
            $table->foreign('block_name_id', 'block_name_fk_3626392')->references('id')->on('blocks');
            $table->unsignedBigInteger('floor_name_id')->nullable();
            $table->foreign('floor_name_id', 'floor_name_fk_3626393')->references('id')->on('floors');
            $table->unsignedBigInteger('units_id')->nullable();
            $table->foreign('units_id', 'units_fk_3715634')->references('id')->on('units');
        });
    }
}
