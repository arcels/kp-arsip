<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKerjaprakteksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kerja_prakteks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_sk')->unsigned();
            $table->integer('kp_no');
            $table->string('kp_hal');
            $table->string('kp_perusahaan');
            $table->string('kp_mahasiswa');
            $table->integer('kp_nim');
            $table->date('kp_mulai');
            $table->date('kp_selesai');
            $table->char('kp_status')->default('1');
            $table->date('updated_at');
            $table->date('created_at');
            $table->foreign('id_sk')->references('id')->on('surat_keluars');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kerjaprakteks');
    }
}
