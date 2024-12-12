<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    // Columnas que son asignables de manera masiva
    protected $fillable = ['title', 'body', 'image', 'pdf' ];
}