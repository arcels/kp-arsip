<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsistensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_sk')->unsigned();
            $table->integer('as_no');
            $table->string('as_nama');
            $table->string('as_nim');
            $table->integer('as_prodi')->unsigned();
            $table->string('as_makul');
            $table->integer('as_kelas');
            $table->integer('as_semester');
            $table->string('as_tahun');
            $table->char('as_status')->default('1');
            $table->date('updated_at');
            $table->date('created_at');
            $table->foreign('id_sk')->references('id')->on('surat_keluars');
            $table->foreign('as_prodi')->references('id')->on('prodis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asistens');
    }
}
