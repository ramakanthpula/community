<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToExpectedVisitsTable extends Migration
{
    public function up()
    {
        Schema::table('expected_visits', function (Blueprint $table) {
            $table->unsignedBigInteger('unit_no_id')->nullable();
            $table->foreign('unit_no_id', 'unit_no_fk_3750147')->references('id')->on('allot_units');
        });
    }
}
