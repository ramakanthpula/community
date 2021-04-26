<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDefectsTable extends Migration
{
    public function up()
    {
        Schema::table('defects', function (Blueprint $table) {
            $table->unsignedBigInteger('users_id')->nullable();
            $table->foreign('users_id', 'users_fk_3715309')->references('id')->on('users');
            $table->unsignedBigInteger('defect_type_id');
            $table->foreign('defect_type_id', 'defect_type_fk_3715315')->references('id')->on('defect_categories');
            $table->unsignedBigInteger('defect_sub_type_id');
            $table->foreign('defect_sub_type_id', 'defect_sub_type_fk_3715316')->references('id')->on('defect_sub_categories');
        });
    }
}
