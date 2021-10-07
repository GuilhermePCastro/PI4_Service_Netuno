<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioAdmin extends Model
{
    use HasFactory;
    protected $fillable = [
        'ds_email',
        'ds_senha',
    ];
    protected $hidden = [
        'ds_senha',
    ];
}
