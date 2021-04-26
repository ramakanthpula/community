<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuilderInformationsTable extends Migration
{
    public function up()
    {
        Schema::create('builder_informations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name');
            $table->string('builder_name');
            $table->string('company_phone');
            $table->string('company_address');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
