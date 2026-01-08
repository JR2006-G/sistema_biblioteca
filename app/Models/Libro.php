<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable = ['editorial_id', 'titulo', 'isbn', 'paginas'];

    public function editorial()
    {
        return $this->belongsTo(Editorial::class);
    }

    public function autores()
    {
        return $this->belongsToMany(Autor::class);
    }
}
