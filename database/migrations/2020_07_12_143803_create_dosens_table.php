<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDosensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dosens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dosen_nidn')->unique();
            $table->string('dosen_nama');
            $table->string('dosen_email');
            $table->string('dosen_jabatan');
            $table->char('dosen_status')->default('1');
            $table->date('updated_at');
            $table->date('created_at');
            $table->integer('prodi_id')->unsigned();
            $table->foreign('prodi_id')->references('id')->on('prodis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dosens');
    }
}
