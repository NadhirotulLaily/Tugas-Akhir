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
        // Schema::create('pilih_tugas', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('tugas', length: 45);
        //     $table->integer('waktu');
        //     $table->string('bukti_tugas');
        //     $table->timestamps();
        // });
        
        Schema::create('pilih_tugas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tugas_id')->constrained('tugas');
            $table->string('bukti_tugas')->nullable();
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
        Schema::dropIfExists('pilih_tugas');
    }
};
