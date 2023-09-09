<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('tema_id');
            $table->foreignId('guru_id')->nullable();
            $table->foreignId('kelompok_id')->nullable();
            // $table->enum('hari', ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Sabtu', 'Minggu']);
            $table->String('sabtu');
            $table->String('sub_sabtu')->nullable();
            $table->String('ket_sabtu')->nullable();
            $table->String('minggu');
            $table->String('sub_minggu')->nullable();
            $table->String('ket_minggu')->nullable();
            $table->String('senin');
            $table->String('sub_senin')->nullable();
            $table->String('ket_senin')->nullable();
            $table->String('selasa');
            $table->String('sub_selasa')->nullable();
            $table->String('ket_selasa')->nullable();
            $table->String('rabu');
            $table->String('sub_rabu')->nullable();
            $table->String('ket_rabu')->nullable();
            $table->String('kamis');
            $table->String('sub_kamis')->nullable();
            $table->String('ket_kamis')->nullable();
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
        Schema::dropIfExists('jadwal');
    }
}
