<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMeetingsTable extends Migration
{
    public function up()
    {
        Schema::table('meetings', function (Blueprint $table) {
            $table->unsignedBigInteger('select_user_group_id')->nullable();
            $table->foreign('select_user_group_id', 'select_user_group_fk_3774703')->references('id')->on('teams');
            $table->unsignedBigInteger('specific_users_id')->nullable();
            $table->foreign('specific_users_id', 'specific_users_fk_3774704')->references('id')->on('users');
        });
    }
}
