<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpectedVisitPurposeOfVisitPivotTable extends Migration
{
    public function up()
    {
        Schema::create('expected_visit_purpose_of_visit', function (Blueprint $table) {
            $table->unsignedBigInteger('expected_visit_id');
            $table->foreign('expected_visit_id', 'expected_visit_id_fk_3750158')->references('id')->on('expected_visits')->onDelete('cascade');
            $table->unsignedBigInteger('purpose_of_visit_id');
            $table->foreign('purpose_of_visit_id', 'purpose_of_visit_id_fk_3750158')->references('id')->on('purpose_of_visits')->onDelete('cascade');
        });
    }
}
