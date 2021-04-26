<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpectedVisitsTable extends Migration
{
    public function up()
    {
        Schema::create('expected_visits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('visit_type');
            $table->string('name');
            $table->string('no_of_persons');
            $table->string('gender');
            $table->longText('address')->nullable();
            $table->string('check_in_type');
            $table->string('visiting_type');
            $table->string('check_in_by');
            $table->string('vehicle_type');
            $table->date('expected_in_date')->nullable();
            $table->string('expected_in_time');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
