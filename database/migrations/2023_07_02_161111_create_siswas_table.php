<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('kelompok_id')->nullable();
            $table->foreignId('tahun_id')->nullable();
            $table->string('no_induk')->unique()->nullable();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('jk_siswa');
            $table->string('alamat');
            $table->text('photo')->nullable();
            $table->string('nama_ortu');
            $table->string('no_telp');
            $table->enum('status', ['aktif', 'pindah', 'keluar', 'lulus'])->default('aktif');
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
        Schema::dropIfExists('siswa');
    }
}
