<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRenewTenanciesTable extends Migration
{
    public function up()
    {
        Schema::table('renew_tenancies', function (Blueprint $table) {
            $table->unsignedBigInteger('block_name_id');
            $table->foreign('block_name_id', 'block_name_fk_3715716')->references('id')->on('blocks');
            $table->unsignedBigInteger('floor_name_id');
            $table->foreign('floor_name_id', 'floor_name_fk_3715717')->references('id')->on('floors');
            $table->unsignedBigInteger('owner_unit_id');
            $table->foreign('owner_unit_id', 'owner_unit_fk_3715749')->references('id')->on('allot_units');
        });
    }
}
