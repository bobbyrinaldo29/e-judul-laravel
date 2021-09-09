<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblListJudulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_list_juduls', function (Blueprint $table) {
            $table->id();
            $table->string('thn_ajaran_id');
            $table->string('namaJudul')->unique();
            $table->string('penulis');
            $table->string('metode');
            $table->text('abstrak');
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
        Schema::dropIfExists('tbl_list_juduls');
    }
}
