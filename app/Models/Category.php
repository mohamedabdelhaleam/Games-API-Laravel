<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = ['name', 'image'];
    protected $hidden = [];
    public $timestamps = false;


    public function Games()
    {
        return $this->hasMany(Game::class, 'category_id', 'id');
    }
}
