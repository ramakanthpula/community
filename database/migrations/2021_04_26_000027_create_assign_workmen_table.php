<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignWorkmenTable extends Migration
{
    public function up()
    {
        Schema::create('assign_workmen', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('unit_assignment');
            $table->longText('working_area')->nullable();
            $table->string('weekly_off');
            $table->date('contract_effective_date')->nullable();
            $table->date('from_date');
            $table->date('to_date')->nullable();
            $table->string('gate_pass_status');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
