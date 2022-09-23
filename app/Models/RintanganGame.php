<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RintanganGame extends Model
{
    use HasFactory;

    protected $table = 'rintangan_games';

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function levelgame(){
        return $this->hasOne(LevelGame::class);
    }
    public function playgame(){
        return $this->hasOne(PlayGame::class);
    }
    public function detailgames(){
        return $this->hasMany(DetailLevel::class);
    }
}
