<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratkeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_keluars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sk_kode');
            $table->string('sk_kpj')->nullable();
            $table->string('sk_title');
            $table->date('sk_tgl');
            $table->integer('sk_penanggungjawab')->unsigned();
            $table->string('sk_kepada');
            $table->char('sk_status')->default('0');
            $table->string('sk_upload')->default('');
            $table->date('updated_at');
            $table->date('created_at');
            $table->foreign('sk_penanggungjawab')->references('id')->on('dosens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_keluars');
    }
}
