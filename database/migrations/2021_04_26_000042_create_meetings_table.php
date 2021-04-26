<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingsTable extends Migration
{
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->time('from');
            $table->time('to');
            $table->string('venue');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->string('attendees');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
