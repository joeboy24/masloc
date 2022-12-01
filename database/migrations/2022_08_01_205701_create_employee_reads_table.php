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
            $table->string('user_id', 50);
            $table->string('staff_id', 50)->nullable();
            $table->string('afis_no', 50)->nullable();
            $table->string('fullname', 100)->nullable();
            
            $table->string('fname', 50)->nullable();
            $table->string('sname', 50)->nullable();
            $table->string('oname', 50)->nullable();

            $table->string('month', 50)->nullable();
            $table->string('taxation_id', 50)->nullable();
            $table->string('employee_id', 50)->nullable();
            $table->string('position', 50)->nullable();
            $table->string('salary', 50);
            $table->string('ssf', 50)->nullable();
            $table->string('sal_aft_ssf', 50)->nullable();
            $table->string('rent', 50)->nullable();
            $table->string('prof', 50)->nullable();
            // $table->string('tot_income', 50);
            $table->string('taxable_inc', 50)->nullable();
            $table->string('income_tax', 50)->nullable();
            $table->string('net_aft_inc_tax', 50)->nullable();
            $table->string('resp', 50)->nullable();
            $table->string('risk', 50)->nullable();
            $table->string('vma', 50)->nullable();
            $table->string('ent', 50)->nullable();
            $table->string('dom', 50)->nullable();
            $table->string('intr', 50)->nullable();
            $table->string('tnt', 50)->nullable();
            $table->string('back_pay', 50)->nullable();
            $table->string('net_bef_ded', 50)->nullable();
            $table->string('staff_loan', 50)->default(0);
            $table->string('net_aft_ded', 50)->nullable();
            $table->string('ssf_emp_cont', 50)->nullable();
            $table->string('tot_ded', 50)->nullable();
            $table->string('ssn', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('dept', 50)->nullable();
            $table->string('region', 50)->nullable();
            // $table->string('bank_id', 50)->nullable();
            $table->string('bank', 50)->nullable();
            $table->string('branch', 50)->nullable();
            $table->string('acc_no', 50)->nullable();
            $table->string('sub_div', 50)->nullable();
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
        Schema::dropIfExists('employee_reads', 50);
    }
}
