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
            $table->string('user_id', 50);
            $table->string('department_id', 50)->nullable();
            $table->string('allowance_id', 50)->nullable();
            $table->string('salarycat_id', 50)->nullable();
            $table->string('salary_id', 50)->nullable();
            $table->string('bank_id', 50)->nullable();
            $table->string('loan_id', 50)->nullable();
            $table->string('staff_id', 50)->nullable();
            $table->string('afis_no', 50)->nullable();

            $table->string('fname', 50);
            $table->string('sname', 50); 
            $table->string('oname', 50)->nullable();
            $table->string('gender', 50)->nullable();
            $table->string('dob', 50)->nullable();
            $table->string('position', 50)->nullable();
            $table->string('date_emp', 50)->nullable();
            $table->string('cur_pos', 50)->nullable();
            $table->string('ssn', 50)->nullable();
            $table->string('salary', 50)->nullable();
            $table->string('contact', 50)->nullable();
            $table->string('ssf', 50)->nullable();
            $table->string('2tier_ssf', 50)->nullable();

            $table->string('email', 50)->nullable();
            $table->string('dept', 50)->nullable();
            $table->string('region', 50)->nullable();
            $table->string('bank', 50)->nullable();
            $table->string('branch', 50)->nullable();
            $table->string('acc_no', 50)->nullable();
            $table->string('sub_div', 50)->nullable();
            $table->string('staff_loan', 50)->default(0);

            $table->string('loan_date_started', 50)->nullable();
            $table->string('loan_bal', 50)->default(0);
            $table->string('loan_monthly_ded', 50)->default(0);

            $table->string('photo', 50)->default('noimage.png', 50);
            $table->string('status', 50)->default('Active', 50); 
            $table->string('del', 50)->default('no', 50);

            // 'user_id', 'staff_id', 'afis_no', 'fullname', 'month', 'taxation_id', 'employee_id', 'position', 'salary', 'ssf', 'sal_aft_ssf', 'rent', 'prof', 'taxable_inc',
            // 'income_tax', 'net_aft_inc_tax', 'resp', 'risk', 'vma', 'ent', 'dom', 'intr', 'tnt', 'back_pay', 'net_bef_ded', 'staff_loan',
            // 'net_aft_ded', 'ssf_emp_cont', 'tot_ded', 'ssn', 'email', 'dept', 'region', 'bank', 'branch', 'acc_no', 'sub_div'
        
            // $table->string('biometric_reg_no', 50);
            // $table->string('year', 50)->nullable();
            // $table->string('years_served', 50)->nullable();
            // $table->string('staff_id', 50);
            // $table->string('name', 50);
            // $table->string('age', 50);
            // $table->string('qualification', 50);
            // $table->string('prog', 50);
            // $table->string('classification', 50);
            // $table->string('grade', 50);
            // $table->string('level', 50);
            // $table->string('ssnit_no', 50);
            // $table->string('contact', 50);


            // $table->string('photo', 50);
            // $table->string('email', 50);
            // $table->string('nat_id', 50);
            // $table->string('passport', 50);
            // $table->string('marital_status', 50);
            // $table->string('religion', 50);
            // $table->string('region', 50);
            // $table->string('res_address', 50);
            // $table->string('city', 50);
            // $table->string('nok', 50);
            // $table->string('nok_contact', 50);
            // $table->string('status', 50)->default('Active', 50);
            // $table->string('del', 50)->default('no', 50);
            $table->primary(array('dob', 'email', 'acc_no'));
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
        Schema::dropIfExists('employees', 50);
    }
}
