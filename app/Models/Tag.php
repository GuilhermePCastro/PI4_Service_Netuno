<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tb_tag';

    protected $fillable = ['id','ds_nome', 'tg_filtro'];

    public function produtos(){
        return $this->belongsToMany(Produto::class);
    }
}
