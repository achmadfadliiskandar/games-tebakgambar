<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailLevel extends Model
{
    use HasFactory;

    protected $table = 'detail_levels';

    protected $guarded = ['id'];

    public function levelgames(){
        return $this->belongsTo(LevelGame::class,'level_games_id');
    }
    public function rintangangames(){
        return $this->belongsTo(RintanganGame::class,'rintangan_games_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
