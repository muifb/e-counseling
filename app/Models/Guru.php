<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'guru';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kelompok()
    {
        return $this->hasOne(Kelompok::class);
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }

    public function report()
    {
        return $this->hasMany(Report::class);
    }

    public function perkembangan()
    {
        return $this->hasMany(Perkembangan::class)->latest();
    }
}
