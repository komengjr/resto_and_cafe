<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQInvDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('q_inv_detail', function (Blueprint $table) {
            $table->id('id_inv_detail');
            $table->string('no_inv');
            $table->string('m_bahan_code');
            $table->integer('qty_detail');
            $table->integer('price_detail');
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
        Schema::dropIfExists('q_inv_detail');
    }
}
