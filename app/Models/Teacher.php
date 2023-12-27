<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'materia_id'];

    public function materia()
    {
        return $this->belongsTo(Subject::class, 'materia_id');
    }
}
