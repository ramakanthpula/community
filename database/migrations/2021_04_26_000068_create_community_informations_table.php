<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunityInformationsTable extends Migration
{
    public function up()
    {
        Schema::create('community_informations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('security_office_mobile_no');
            $table->string('secretary_mobile_no')->nullable();
            $table->string('moderator_mobile_no')->nullable();
            $table->string('construction_year')->nullable();
            $table->string('address');
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
