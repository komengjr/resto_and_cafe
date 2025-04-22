<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMBahanMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_bahan_master', function (Blueprint $table) {
            $table->id('id_bahan');
            $table->string('m_bahan_code')->unique();
            $table->string('m_bahan_name');
            $table->string('m_bahan_type');
            $table->string('m_bahan_satuan');
            $table->integer('m_bahan_status');
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
        Schema::dropIfExists('m_bahan_master');
    }
}
