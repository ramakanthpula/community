<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunityRulesTable extends Migration
{
    public function up()
    {
        Schema::create('community_rules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('apartment_policies');
            $table->longText('code_of_conduct');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
