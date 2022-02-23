<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDsuratmasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('d_surat_masuks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sm_id')->unsigned();
            $table->integer('sm_dosen')->unsigned();
            $table->date('updated_at');
            $table->date('created_at');
            $table->foreign('sm_id')->references('id')->on('surat_masuks');
            $table->foreign('sm_dosen')->references('id')->on('dosens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('d_surat_masuks');
    }
}
