<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRenewTenanciesTable extends Migration
{
    public function up()
    {
        Schema::create('renew_tenancies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('tenancy_status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
