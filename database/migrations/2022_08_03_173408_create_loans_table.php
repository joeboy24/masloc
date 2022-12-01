<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('employee_id')->nullable();
            $table->string('elig_amt')->nullable();
            $table->string('lump_sum')->nullable();
            $table->string('dur')->nullable(); 
            $table->string('interest')->nullable(); 
            $table->string('monthly_ded')->nullable();
            $table->string('bal')->default(0);
            $table->string('date_started')->nullable();
            $table->string('months_left')->nullable();
            $table->string('amt_paid')->default(0);
            $table->string('status')->default('active');
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
        Schema::dropIfExists('loans');
    }
}
