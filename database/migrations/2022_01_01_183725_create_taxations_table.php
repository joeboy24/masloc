<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxations', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('month');
            $table->string('employee_id');
            $table->string('position');
            $table->string('salary');
            $table->string('rent');
            $table->string('prof');
            $table->string('tot_income');
            $table->string('ssf');
            $table->string('taxable_inc');
            $table->string('tax_pay');
            $table->string('first1');
            $table->string('next1');
            $table->string('next2');
            $table->string('next3');
            $table->string('next4');
            $table->string('next5');
            $table->string('net_amount');
            $table->string('del')->default('no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taxations');
    }
}
