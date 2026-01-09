<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Autor extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_real', 'email'];

    public function seudonimo()
    {
        return $this->hasOne(Seudonimo::class);
    }

    public function libros()
    {
        return $this->belongsToMany(Libro::class, 'autor_libro');
    }
}

