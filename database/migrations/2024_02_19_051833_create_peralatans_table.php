<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peralatans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('slug');
            $table->string('identitas');
            $table->string('rangka');
            $table->string('style')->default('none');
            $table->date('periode')->nullable();
            $table->date('periode_akhir')->nullable();
            $table->string('merk')->nullable();
            $table->string('keterangan')->nullable();
            $table->integer('pdf_status')->default(0);
            $table->integer('mechanic_sign')->nullable();
            $table->integer('safety_sign')->nullable();
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
        Schema::dropIfExists('peralatans');
    }
};
