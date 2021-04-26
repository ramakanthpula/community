<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticeBoardsTable extends Migration
{
    public function up()
    {
        Schema::create('notice_boards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('description');
            $table->string('publish')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
