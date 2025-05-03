<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatMasterStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_staff', function (Blueprint $table) {
            $table->id('id_staff');
            $table->string('userid')->unique();
            $table->string('master_staff_nik')->index();
            $table->string('master_staff_nip')->index();
            $table->string('master_staff_name');
            $table->string('master_staff_ttl');
            $table->string('master_staff_bod');
            $table->string('master_staff_sex');
            $table->string('master_staff_agama');
            $table->string('master_staff_hp');
            $table->string('master_staff_job');
            $table->string('master_staff_cab');
            $table->text('master_staff_alamat');
            $table->text('master_staff_file');
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
        Schema::dropIfExists('master_staff');
    }
}
