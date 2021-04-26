<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupvisitorsTable extends Migration
{
    public function up()
    {
        Schema::create('groupvisitors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('gender')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
