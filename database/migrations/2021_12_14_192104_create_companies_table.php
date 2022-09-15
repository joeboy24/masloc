<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('name');
            $table->string('abrv')->nullable();
            $table->string('comp_add');
            $table->string('location')->nullable();
            $table->string('contact');
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            
            $table->string('reg_status')->default('closed');
            $table->string('exam_status')->nullable();
            $table->string('reg_date')->nullable();
            $table->string('ac_year')->nullable();
            $table->string('ac_term')->nullable();
            
            $table->string('logo');
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
        Schema::dropIfExists('companies');
    }
}
