<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlocksTable extends Migration
{
    public function up()
    {
        Schema::create('blocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('block_name');
            $table->string('block_admin_contact');
            $table->string('password');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
