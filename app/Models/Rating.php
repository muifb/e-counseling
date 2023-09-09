<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'evaluasi';

    public function perkembangan()
    {
        return $this->belongsTo(Perkembangan::class);
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
    public function tema()
    {
        return $this->belongsTo(Tema::class);
    }
}
