<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnquiryCategoryHelpDeskPivotTable extends Migration
{
    public function up()
    {
        Schema::create('enquiry_category_help_desk', function (Blueprint $table) {
            $table->unsignedBigInteger('help_desk_id');
            $table->foreign('help_desk_id', 'help_desk_id_fk_3715214')->references('id')->on('help_desks')->onDelete('cascade');
            $table->unsignedBigInteger('enquiry_category_id');
            $table->foreign('enquiry_category_id', 'enquiry_category_id_fk_3715214')->references('id')->on('enquiry_categories')->onDelete('cascade');
        });
    }
}
