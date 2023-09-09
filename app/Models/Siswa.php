<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'siswa';
    // protected $with = ['user', 'kelompok'];
    protected $with = ['kelompok'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kelompok()
    {
        return $this->belongsTo(Kelompok::class);
    }

    public function tahun()
    {
        return $this->belongsTo(tahun::class);
    }

    public function perkembangan()
    {
        return $this->hasMany(Perkembangan::class)->latest();
    }

    public function report()
    {
        return $this->hasMany(Report::class)->latest();
    }

    public function rating()
    {
        return $this->hasMany(Rating::class);
    }
}
