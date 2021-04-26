<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefectsTable extends Migration
{
    public function up()
    {
        Schema::create('defects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('mobile');
            $table->string('email');
            $table->string('flat_no');
            $table->datetime('incident_date')->nullable();
            $table->string('incident_location');
            $table->string('defect_details');
            $table->longText('problem_description');
            $table->time('convenient_time');
            $table->longText('desired_outcome');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
