<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagementCommitteesTable extends Migration
{
    public function up()
    {
        Schema::create('management_committees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('member_name')->unique();
            $table->string('email');
            $table->string('password');
            $table->string('phone');
            $table->longText('present_address')->nullable();
            $table->longText('permanent_address');
            $table->string('aadhaar');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->string('member_status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
