<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $table = 'games';
    protected $fillable = ['name', 'image', 'countservice', 'category_id'];
    protected $hidden = ['category_id'];
    public $timestamps = false;

    public function Product()
    {
        return $this->hasMany(Product::class, 'game_id', 'id');
    }
    public function Category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
