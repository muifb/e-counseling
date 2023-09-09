<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailReport extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'detailreport';

    public function report()
    {
        return $this->belongsTo(Report::class);
    }
}
