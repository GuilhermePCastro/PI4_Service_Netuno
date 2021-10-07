<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','ds_nome', 'ds_cpf', 'ds_celular', 'ds_email'];
    protected $table = 'tb_cliente';

    public function usuario(){
        return $this->belongsTo(User::class);
    }


}
