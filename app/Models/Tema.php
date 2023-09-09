<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'tema';

    public function perkembangan()
    {
        return $this->hasMany(Perkembangan::class);
    }

    public function rating()
    {
        return $this->hasMany(Rating::class);
    }

    // public function jadwal()
    // {
    //     return $this->hasMany(Jadwal::class);
    // }

    public function tahun()
    {
        return $this->belongsTo(tahun::class);
    }
}
