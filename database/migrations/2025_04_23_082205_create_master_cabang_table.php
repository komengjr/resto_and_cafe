<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterCabangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_cabang', function (Blueprint $table) {
            $table->id('id_cabang');
            $table->string('master_cabang_code')->unique();
            $table->string('master_cabang_name');
            $table->string('master_cabang_type');
            $table->text('master_cabang_location');
            $table->string('master_cabang_status');
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
        Schema::dropIfExists('master_cabang');
    }
}
