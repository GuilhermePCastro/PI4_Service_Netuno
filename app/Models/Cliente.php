<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['ds_nome', 'ds_cpf', 'ds_celular', 'ds_email', 'ds_senha'];
    protected $table = 'tb_cliente';


}
