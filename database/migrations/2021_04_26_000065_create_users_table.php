<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable()->unique();
            $table->datetime('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('remember_token')->nullable();
            $table->boolean('approved')->default(0)->nullable();
            $table->boolean('verified')->default(0)->nullable();
            $table->datetime('verified_at')->nullable();
            $table->string('verification_token')->nullable();
            $table->string('contact')->nullable();
            $table->string('alternate_contact')->nullable();
            $table->string('age')->nullable();
            $table->string('profession')->nullable();
            $table->string('present_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('nid')->nullable();
            $table->boolean('two_factor')->default(0)->nullable();
            $table->string('two_factor_code')->nullable();
            $table->datetime('two_factor_expires_at')->nullable();
            $table->string('type')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('tenancy_status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
