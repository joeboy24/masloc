<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxationReadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxation_reads', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('employee_id')->nullable();
            $table->string('name');
            $table->string('pos');
            $table->string('basic_sal');
            $table->string('rent_alw')->nullable();
            $table->string('prof_alw')->nullable();
            $table->string('total_income')->nullable();
            $table->string('ssf')->nullable();
            $table->string('tax_income')->nullable();
            $table->string('tot_tax_pay')->nullable();
            $table->string('first319')->nullable();
            $table->string('next419')->nullable();
            $table->string('next539')->nullable();
            $table->string('cum_income')->nullable();
            $table->string('next3539')->nullable();
            $table->string('next20000')->nullable();
            $table->string('net_amt')->nullable();
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
        Schema::dropIfExists('taxation_reads');
    }
}
