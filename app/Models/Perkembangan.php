<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perkembangan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'perkembangan';
    protected $with = ['tema', 'detailPerkembangan'];

    public function tema()
    {
        return $this->belongsTo(Tema::class);
    }
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function detailPerkembangan()
    {
        return $this->hasMany(Detailperkembangan::class);
    }

    public function rating()
    {
        return $this->hasOne(Rating::class);
    }
}
