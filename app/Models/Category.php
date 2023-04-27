<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    // ! una categoria a quanti comic può essere associata? N
    public function comics() {
        // ! una categoria ha molti comic associati
        return $this->hasMany(Comic::class);
    }
}
