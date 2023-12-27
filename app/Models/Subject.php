<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    public function professores()
    {
        return $this->hasMany(Teacher::class, 'materia_id');
    }
}
