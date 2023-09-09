<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            // $table->foreignId('tema_id')->nullable();
            $table->string('nuptk')->unique()->nullable();
            $table->string('nama_guru');
            $table->text('photo')->nullable();
            $table->string('jk_guru');
            $table->string('no_telp');
            $table->string('devisi');
            $table->date('tgl_lahir');
            $table->string('alamat');
            $table->string('pendidikan');
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
        Schema::dropIfExists('guru');
    }
}
