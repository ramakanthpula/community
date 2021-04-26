<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDefectSubCategoriesTable extends Migration
{
    public function up()
    {
        Schema::table('defect_sub_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('defect_category_id')->nullable();
            $table->foreign('defect_category_id', 'defect_category_fk_3715209')->references('id')->on('defect_categories');
        });
    }
}
