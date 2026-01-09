<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Editorial extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'pais'];

    public function libros()
    {
        return $this->hasMany(Libro::class);
    }
}

