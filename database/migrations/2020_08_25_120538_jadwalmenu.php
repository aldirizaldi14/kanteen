<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Jadwalmenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwalmenu', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->date('tanggal');
            $table->string('waktu');
            $table->string('snack1');
            $table->integer('jsnack1');
            $table->string('snack2');
            $table->integer('jsnack2');
            $table->string('makanan1');
            $table->integer('banyaknya1');
            $table->string('makanan2');
            $table->integer('banyaknya2');
            $table->string('makanan3');
            $table->integer('banyaknya3');
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
