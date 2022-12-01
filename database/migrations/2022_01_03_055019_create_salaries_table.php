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
            $table->string('user_id', 50);
            $table->string('month', 50);
            $table->string('taxation_id', 50);
            $table->string('employee_id', 50);
            $table->string('position', 50);
            $table->string('salary', 50);
            $table->string('ssf', 50)->default(0);
            $table->string('sal_aft_ssf', 50)->default(0);
            $table->string('rent', 50)->default(0);
            $table->string('prof', 50)->default(0);
            // $table->string('tot_income', 50);
            $table->string('taxable_inc', 50)->default(0);
            $table->string('income_tax', 50)->default(0);
            $table->string('net_aft_inc_tax', 50)->default(0);
            $table->string('resp', 50)->default(0);
            $table->string('risk', 50)->default(0);
            $table->string('vma', 50)->default(0);
            $table->string('ent', 50)->default(0);
            $table->string('dom', 50)->default(0);
            $table->string('intr', 50)->default(0);
            $table->string('tnt', 50)->default(0);
            $table->string('cola', 50)->default(0);
            $table->string('new1', 50)->default(0);
            $table->string('new2', 50)->default(0);
            $table->string('new3', 50)->default(0);
            $table->string('new4', 50)->default(0);
            $table->string('new5', 50)->default(0);
            $table->string('back_pay', 50)->default(0);
            $table->string('net_bef_ded', 50)->default(0);
            $table->string('staff_loan', 50)->default(0);
            $table->string('net_aft_ded', 50)->default(0);
            $table->string('ssf_emp_cont', 50)->default(0);
            $table->string('tot_ded', 50)->default(0);
            $table->string('ssn', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('dept', 50)->nullable();
            $table->string('region', 50)->nullable();
            $table->string('bank', 50)->nullable();
            $table->string('branch', 50)->nullable();
            $table->string('acc_no', 50)->nullable();
            // $table->string('net_amount', 50);
            $table->string('del', 50)->default('no', 50);
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
        Schema::dropIfExists('salaries', 50);
    }
}
