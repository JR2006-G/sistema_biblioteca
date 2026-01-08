<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $fillable = ['nombre_real', 'email'];

    public function seudonimo()
    {
        return $this->hasOne(Seudonimo::class);
    }

    public function libros()
    {
        return $this->belongsToMany(Libro::class);
    }
}
