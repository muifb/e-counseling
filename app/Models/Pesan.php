<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pesan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'pesan';

    public function childrens()
    {
        return $this->hasMany(Pesan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hasLike()
    {
        return $this->hasOne(Like::class)->where('likes.user_id', Auth::user()->id);
    }

    public function totalLikes()
    {
        return $this->hasMany(Like::class)->count();
    }
}
