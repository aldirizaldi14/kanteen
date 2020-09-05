<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DataDepartement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DataDepartement', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('departement');
            $table->string('remark');
            $table->string('shift1');
            $table->string('longshift1');
            $table->string('shift2');
            $table->string('longshift2');
            $table->string('shift3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
