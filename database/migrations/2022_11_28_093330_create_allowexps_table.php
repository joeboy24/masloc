<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllowexpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allowexps', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('employee_id');
            $table->string('allowance_id');
            $table->string('rent')->default(0);
            $table->string('prof')->default(0);
            $table->string('resp')->default(0);
            $table->string('risk')->default(0);
            $table->string('vma')->default(0);
            $table->string('ent')->default(0);
            $table->string('dom')->default(0);
            $table->string('cola')->default(0);
            $table->string('intr')->default(0);
            $table->string('tnt')->default(0);

            $table->string('new1')->default(0);
            $table->string('new2')->default(0);
            $table->string('new3')->default(0);
            $table->string('new4')->default(0);
            $table->string('new5')->default(0);

            $table->string('ssf')->default('0');
            $table->string('ssf1')->default('0');
            $table->string('ssf2')->default('0');
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
        Schema::dropIfExists('allowexps');
    }
}
