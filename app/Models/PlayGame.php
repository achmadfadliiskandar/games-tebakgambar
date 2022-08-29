<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayGame extends Model
{
    use HasFactory;

    protected $table = 'play_games';

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function rintangangames()
    {
        return $this->belongsTo(RintanganGame::class,'rintangan_games_id');
    }
}
