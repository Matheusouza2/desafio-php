<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $table = "alunos";

    protected $fillable = [
        "id",
        "nome",
        "email",
        "nascimento",
        "created_at",
        "updated_at"
    ];

    protected $cast = [
        "nascimento" => "date"
    ];
}
