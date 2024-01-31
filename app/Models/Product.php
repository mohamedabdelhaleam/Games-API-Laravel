<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['name', 'price', 'min', 'max', 'game_id'];
    protected $hidden = ['game_id'];
    public $timestamps = false;

    public function Game()
    {
        return $this->belongsTo(Game::class, 'game_id', 'id');
    }
}
