<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkaktifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skaktifs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_sk')->unsigned();
            $table->integer('m_no');
            $table->string('m_mahasiswa');
            $table->string('m_nim');
            $table->integer('m_prodi')->unsigned();
            $table->string('m_tahun');
            $table->string('m_alamat');
            $table->text('m_keperluan');
            $table->char('as_status')->default('1');
            $table->date('updated_at');
            $table->date('created_at');
            $table->foreign('id_sk')->references('id')->on('surat_keluars');
            $table->foreign('m_prodi')->references('id')->on('prodis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skaktifs');
    }
}
