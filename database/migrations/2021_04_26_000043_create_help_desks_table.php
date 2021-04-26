<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHelpDesksTable extends Migration
{
    public function up()
    {
        Schema::create('help_desks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('mobile');
            $table->string('flat_no');
            $table->datetime('timestamp');
            $table->longText('details');
            $table->longText('description');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
