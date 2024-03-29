<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tb_marca';
    protected $fillable = ['id','ds_marca', 'tg_filtro'];

    public function produtos(){
        return $this->hasMany(Produto::class);
    }
}
