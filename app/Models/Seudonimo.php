<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seudonimo extends Model
{
    use HasFactory;

    protected $fillable = ['autor_id', 'nombre_pluma', 'fecha_registro'];

    public function autor()
    {
        return $this->belongsTo(Autor::class);
    }
}

