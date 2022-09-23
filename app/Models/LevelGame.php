<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelGame extends Model
{
    use HasFactory;

    protected $table = 'level_games';

    protected $guarded = ['id'];

    public function detailgames(){
        return $this->hasMany(DetailLevel::class,'level_games_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
