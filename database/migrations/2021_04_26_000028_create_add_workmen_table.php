<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddWorkmenTable extends Migration
{
    public function up()
    {
        Schema::create('add_workmen', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('date_of_birth');
            $table->string('category');
            $table->longText('address_line_1');
            $table->longText('address_line_2')->nullable();
            $table->string('city');
            $table->string('father_husband');
            $table->string('gender')->nullable();
            $table->string('pin_code');
            $table->date('date_of_joining');
            $table->string('aadhaar_number');
            $table->string('blood_group');
            $table->string('photo');
            $table->string('vehicle_number')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
