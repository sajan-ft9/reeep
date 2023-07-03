<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Lang extends Model
{

    use HasFactory;
    protected $fillable = ['title', 'description'];

    protected $casts = [
        'title' => 'json',
        'description' => 'json',
    ];
  
}
