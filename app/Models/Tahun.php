<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahun extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'tahun';

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }

    public function tema()
    {
        return $this->hasMany(Tema::class);
    }

    public function kelompok()
    {
        return $this->hasMany(Kelompok::class);
    }
}
