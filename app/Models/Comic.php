<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'img',
        'genre',
        'editor',
        'abstract',
        'release_year',
        'price'
    ];

    // ! un comic quanti utenti può avere? 1
    public function user() {
        // ! una riga sulla tabella comics ha un solo user_id
        return $this->belongsTo(User::class);
    }

}
