<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorsTable extends Migration
{
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('check_in_type');
            $table->string('name');
            $table->string('gender');
            $table->longText('address');
            $table->string('company')->nullable();
            $table->string('photo')->nullable();
            $table->time('in_time')->nullable();
            $table->time('out_time')->nullable();
            $table->string('whom_to_meet')->nullable();
            $table->string('purpose_of_visit')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
