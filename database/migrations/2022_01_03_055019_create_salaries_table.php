<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('month');
            $table->string('taxation_id');
            $table->string('employee_id');
            $table->string('position');
            $table->string('salary');
            $table->string('ssf')->default(0);
            $table->string('sal_aft_ssf')->default(0);
            $table->string('rent')->default(0);
            $table->string('prof')->default(0);
            // $table->string('tot_income');
            $table->string('taxable_inc')->default(0);
            $table->string('income_tax')->default(0);
            $table->string('net_aft_inc_tax')->default(0);
            $table->string('resp')->default(0);
            $table->string('risk')->default(0);
            $table->string('vma')->default(0);
            $table->string('ent')->default(0);
            $table->string('dom')->default(0);
            $table->string('intr')->default(0);
            $table->string('tnt')->default(0);
            $table->string('back_pay')->default(0);
            $table->string('net_bef_ded')->default(0);
            $table->string('staff_loan')->default(0);
            $table->string('net_aft_ded')->default(0);
            $table->string('ssf_emp_cont')->default(0);
            $table->string('tot_ded')->default(0);
            $table->string('ssn')->nullable();
            $table->string('email')->nullable();
            $table->string('dept')->nullable();
            $table->string('region')->nullable();
            $table->string('bank')->nullable();
            $table->string('branch')->nullable();
            $table->string('acc_no')->nullable();
            // $table->string('net_amount');
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
        Schema::dropIfExists('salaries');
    }
}
