<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'img',
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

    // ! un comic quante categorie ha associate? 1
    public function category() { // ! la chiamo con il nome al singolare del modello in cui sono in relazione (Category)
        return $this->belongsTo(Category::class);
    }

    // ! un comic con quanti formats può essere associato? N
    public function formats() {
        // a quanti comic può appartenere un formato?
        return $this->belongsToMany(Format::class);
    }

}
