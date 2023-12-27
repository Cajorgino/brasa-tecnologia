<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidatura extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'email', 'cidade', 'estado', 'nascimento', 'whats', 'materia', 'descricao'];
}
