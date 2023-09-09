<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->nullable();
            $table->foreignId('guru_id')->nullable();
            // $table->foreignId('kelompok_id')->nullable();
            $table->string('semester')->nullable();
            $table->text('nilai_agama');
            $table->text('motorik');
            $table->text('kognitif');
            $table->text('sosial');
            $table->text('bahasa');
            $table->text('seni');
            $table->enum('status', ['diterima', 'ditolak', 'menunggu'])->default('menunggu');
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
        Schema::dropIfExists('reports');
    }
}
