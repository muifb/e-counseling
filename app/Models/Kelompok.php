<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'kelompok';

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function tahun()
    {
        return $this->belongsTo(Tahun::class);
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }

    public function report()
    {
        return $this->hasManyThrough(Report::class, Siswa::class)->where('reports.status', 'menunggu');
    }
}
