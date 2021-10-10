<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $table = 'tb_endereco';
    protected $fillable = ['id','ds_endereco', 'ds_numero', 'ds_bairro', 'ds_cidade', 'ds_uf', 'ds_cep', 'ds_complemento', 'cliente_id'];

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
}
