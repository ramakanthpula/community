<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunityAdminsTable extends Migration
{
    public function up()
    {
        Schema::create('community_admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email')->unique();
            $table->string('name');
            $table->string('contact');
            $table->string('password');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
