<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tb_produto';

    protected $fillable = [ 'id', 'ds_nome', 'ds_descricao', 'categoria_id', 'vl_produto', 'qt_estoque',
    'marca_id', 'tg_destaque', 'ds_foto', 'ds_dimensoes', 'ds_peso', 'ds_material' ];

    public function categoria(){
        return $this->belongsTo(Categoria::class);

    }

    public function marca(){
        return $this->belongsTo(Marca::class);

    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
