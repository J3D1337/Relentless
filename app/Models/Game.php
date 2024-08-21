<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;


    protected $fillable = ['title', 'image']; // Correct property name

    public function ideas()
    {
        return $this->hasMany(Idea::class)->latest();
    }



}
