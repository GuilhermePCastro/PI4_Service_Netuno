<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $table = 'tb_tag';

    protected $fillable = ['id','tag_nome'];

    public function produtos(){
        return $this->hasMany(Produto::class);
    }
}
