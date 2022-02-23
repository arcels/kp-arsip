<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_sk')->unsigned();
            $table->integer('c_no');
            $table->longText('m_isi')->nullable();
            $table->char('as_status')->default('1');
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
        Schema::dropIfExists('customs');
    }
}
