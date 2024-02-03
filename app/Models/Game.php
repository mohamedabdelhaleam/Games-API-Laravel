<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $table = 'games';
    protected $fillable = ['name', 'image', 'count_service', 'category_id'];
    protected $hidden = ['category_id', 'pivot'];
    public $timestamps = false;

    public function Product()
    {
        return $this->hasMany(Product::class, 'game_id', 'id');
    }
    public function Category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function order()
    {
        return $this->hasOne(Order::class, 'game_id', 'id');
    }
}
