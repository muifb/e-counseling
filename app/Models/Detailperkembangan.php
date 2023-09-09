<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailperkembangan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'fotoperkembangan';

    public function perkembangan()
    {
        return $this->belongsTo(Perkembangan::class);
    }
}
