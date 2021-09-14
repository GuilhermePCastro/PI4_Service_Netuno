<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'tb_categoria';
    protected $fillable = ['id','ds_categoria', 'ds_descricao'];

    public function produtos(){
        return $this->hasMany(Produto::class);
    }
}
