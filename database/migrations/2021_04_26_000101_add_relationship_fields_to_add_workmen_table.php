<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAddWorkmenTable extends Migration
{
    public function up()
    {
        Schema::table('add_workmen', function (Blueprint $table) {
            $table->unsignedBigInteger('skilled_id');
            $table->foreign('skilled_id', 'skilled_fk_3773457')->references('id')->on('skilled_workers');
        });
    }
}
