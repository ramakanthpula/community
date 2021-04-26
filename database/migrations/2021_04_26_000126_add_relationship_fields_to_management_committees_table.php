<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToManagementCommitteesTable extends Migration
{
    public function up()
    {
        Schema::table('management_committees', function (Blueprint $table) {
            $table->unsignedBigInteger('designation_id');
            $table->foreign('designation_id', 'designation_fk_3721689')->references('id')->on('defect_categories');
        });
    }
}
