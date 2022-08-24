<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllowancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allowances', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('employee_id');
            $table->string('fname');
            $table->string('rent')->default('no');
            $table->string('prof')->default('no');
            $table->string('resp')->default('no');
            $table->string('risk')->default('no');
            $table->string('vma')->default('no');
            $table->string('ent')->default('no');
            $table->string('dom')->default('no');
            $table->string('intr')->default('no');
            $table->string('tnt')->default('no');
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
        Schema::dropIfExists('allowances');
    }
}
