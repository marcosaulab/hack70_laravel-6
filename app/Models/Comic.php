<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'img',
        'genre',
        'editor',
        'abstract',
        'release_year',
        'price'
    ];
}
