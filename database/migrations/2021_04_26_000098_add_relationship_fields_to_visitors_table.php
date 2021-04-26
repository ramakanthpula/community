<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToVisitorsTable extends Migration
{
    public function up()
    {
        Schema::table('visitors', function (Blueprint $table) {
            $table->unsignedBigInteger('unit_no_id');
            $table->foreign('unit_no_id', 'unit_no_fk_3749294')->references('id')->on('allot_units');
        });
    }
}
