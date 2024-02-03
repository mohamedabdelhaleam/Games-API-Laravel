<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['name', 'price', 'min', 'max', 'game_id'];
    protected $hidden = ['game_id', 'pivot'];
    public $timestamps = false;

    public function Game()
    {
        return $this->belongsTo(Game::class, 'game_id', 'id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'product_id', 'id');
    }
}
