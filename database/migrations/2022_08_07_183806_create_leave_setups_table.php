<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveSetupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_setups', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('maternity')->nullable();
            $table->string('casual')->nullable();
            $table->string('annual')->nullable();
            $table->string('study')->nullable();
            $table->string('sick')->nullable();
            $table->string('others')->nullable();
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
        Schema::dropIfExists('leave_setups');
    }
}
