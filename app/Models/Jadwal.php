<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'jadwal';
    protected $with = ['kelompok', 'guru'];


    // public function tema()
    // {
    //     return $this->belongsTo(Tema::class);
    // }

    public function kelompok()
    {
        return $this->belongsTo(Kelompok::class);
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
}
