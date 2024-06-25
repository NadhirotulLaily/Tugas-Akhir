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
        Schema::create('pilih_tugas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tugas_id')->constrained('tugas');
            $table->string('email'); // Menggunakan email sebagai foreign key
            $table->string('bukti_tugas')->nullable();
            $table->string('status_verifikasi')->nullable();
            $table->timestamps();

            // Menambahkan foreign key constraint ke users berdasarkan email
            $table->foreign('email')->references('email')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pilih_tugas');
    }
};