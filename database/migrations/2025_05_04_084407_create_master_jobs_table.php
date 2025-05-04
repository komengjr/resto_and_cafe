<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_jobs', function (Blueprint $table) {
            $table->id('id_jobs');
            $table->string('master_jobs_code')->unique();
            $table->string('master_jobs_name');
            $table->string('master_jobs_cabang');
            $table->integer('master_jobs_status')->nullable();
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
        Schema::dropIfExists('master_jobs');
    }
}
