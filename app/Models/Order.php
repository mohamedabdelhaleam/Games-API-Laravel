<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = ['game_id', 'product_id', 'username', 'gamer_id', 'status', 'user_id', 'created_at', 'updated_at'];
    protected $hidden = ['user_id', 'created_at', 'updated_at', 'status', 'pivot'];
    public $timestamps = false;


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function game()
    {
        return $this->hasOne(Game::class, 'game_id', 'id');
    }
    public function product()
    {
        return $this->hasOne(Product::class, 'product_id', 'id');
    }
}
