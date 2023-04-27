<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Format extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    // ! un format a quanti comic può essere associato? N
    public function comics() {
        return $this->belongsToMany(Comic::class);
    }


}
