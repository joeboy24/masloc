<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeReadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_reads', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('staff_id')->nullable();
            $table->string('afis_no')->nullable();
            $table->string('fullname')->nullable();
            $table->string('month')->nullable();
            $table->string('taxation_id')->nullable();
            $table->string('employee_id')->nullable();
            $table->string('position')->nullable();
            $table->string('salary');
            $table->string('ssf')->nullable();
            $table->string('sal_aft_ssf')->nullable();
            $table->string('rent')->nullable();
            $table->string('prof')->nullable();
            // $table->string('tot_income');
            $table->string('taxable_inc')->nullable();
            $table->string('income_tax')->nullable();
            $table->string('net_aft_inc_tax')->nullable();
            $table->string('resp')->nullable();
            $table->string('risk')->nullable();
            $table->string('vma')->nullable();
            $table->string('ent')->nullable();
            $table->string('dom')->nullable();
            $table->string('intr')->nullable();
            $table->string('tnt')->nullable();
            $table->string('back_pay')->nullable();
            $table->string('net_bef_ded')->nullable();
            $table->string('staff_loan')->nullable();
            $table->string('net_aft_ded')->nullable();
            $table->string('ssf_emp_cont')->nullable();
            $table->string('tot_ded')->nullable();
            $table->string('ssn')->nullable();
            $table->string('email')->nullable();
            $table->string('dept')->nullable();
            $table->string('region')->nullable();
            // $table->string('bank_id')->nullable();
            $table->string('bank')->nullable();
            $table->string('branch')->nullable();
            $table->string('acc_no')->nullable();
            $table->string('sub_div')->nullable();
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
        Schema::dropIfExists('employee_reads');
    }
}
