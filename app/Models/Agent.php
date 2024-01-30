<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;
    protected $table = 'agents';
    protected $fillable = ['name', 'image', 'address'];
    protected $hidden = [];
    public $timestamps = false;
}
