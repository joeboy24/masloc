<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('department_id')->nullable();
            $table->string('allowance_id')->nullable();
            $table->string('salarycat_id')->nullable();
            $table->string('salary_id')->nullable();
            $table->string('bank_id')->nullable();
            $table->string('staff_id')->nullable();
            $table->string('afis_no')->nullable();

            $table->string('fname');
            $table->string('sname'); 
            $table->string('oname')->nullable();
            $table->string('gender')->nullable();
            $table->string('dob')->nullable();
            $table->string('position')->nullable();
            $table->string('date_emp')->nullable();
            $table->string('cur_pos')->nullable();
            $table->string('ssn')->nullable();
            $table->string('salary')->nullable();
            $table->string('contact')->nullable();
            $table->string('ssf')->nullable();
            $table->string('2tier_ssf')->nullable();

            $table->string('email')->nullable();
            $table->string('dept')->nullable();
            $table->string('region')->nullable();
            $table->string('bank')->nullable();
            $table->string('branch')->nullable();
            $table->string('acc_no')->nullable();
            $table->string('sub_div')->nullable();
            $table->string('staff_loan')->default(0);

            $table->string('loan_date_started')->nullable();
            $table->string('loan_bal')->default(0);
            $table->string('loan_monthly_ded')->default(0);

            $table->string('photo')->default('noimage.png');
            $table->string('status')->default('Active'); 
            $table->string('del')->default('no');

            // 'user_id', 'staff_id', 'afis_no', 'fullname', 'month', 'taxation_id', 'employee_id', 'position', 'salary', 'ssf', 'sal_aft_ssf', 'rent', 'prof', 'taxable_inc',
            // 'income_tax', 'net_aft_inc_tax', 'resp', 'risk', 'vma', 'ent', 'dom', 'intr', 'tnt', 'back_pay', 'net_bef_ded', 'staff_loan',
            // 'net_aft_ded', 'ssf_emp_cont', 'tot_ded', 'ssn', 'email', 'dept', 'region', 'bank', 'branch', 'acc_no', 'sub_div'
        
            // $table->string('biometric_reg_no');
            // $table->string('year')->nullable();
            // $table->string('years_served')->nullable();
            // $table->string('staff_id');
            // $table->string('name');
            // $table->string('age');
            // $table->string('qualification');
            // $table->string('prog');
            // $table->string('classification');
            // $table->string('grade');
            // $table->string('level');
            // $table->string('ssnit_no');
            // $table->string('contact');


            // $table->string('photo');
            // $table->string('email');
            // $table->string('nat_id');
            // $table->string('passport');
            // $table->string('marital_status');
            // $table->string('religion');
            // $table->string('region');
            // $table->string('res_address');
            // $table->string('city');
            // $table->string('nok');
            // $table->string('nok_contact');
            // $table->string('status')->default('Active');
            // $table->string('del')->default('no');
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
        Schema::dropIfExists('employees');
    }
}
