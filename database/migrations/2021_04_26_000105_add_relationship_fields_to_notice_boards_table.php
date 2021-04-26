<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToNoticeBoardsTable extends Migration
{
    public function up()
    {
        Schema::table('notice_boards', function (Blueprint $table) {
            $table->unsignedBigInteger('recipients_id')->nullable();
            $table->foreign('recipients_id', 'recipients_fk_3707380')->references('id')->on('users');
        });
    }
}
