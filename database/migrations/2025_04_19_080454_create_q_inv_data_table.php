<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQInvDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('q_inv_data', function (Blueprint $table) {
            $table->id('id_invoice');
            $table->string('no_inv')->unique();
            $table->string('name_inv');
            $table->bigInteger('price_inv');
            $table->date('date_inv');
            $table->string('status_inv');
            $table->text('file_inv');
            $table->string('cabang_inv');
            $table->string('user_created');
            $table->string('user_verif')->nullable();
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
        Schema::dropIfExists('q_inv_data');
    }
}
