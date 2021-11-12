<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','ds_nome', 'ds_cpf', 'ds_celular', 'ds_email', 'ds_fotoperfil'];
    protected $table = 'tb_cliente';

    public function usuario(){
        return $this->belongsTo(User::class);
    }

    public function enderecos(){
        return $this->hasMany(Endereco::class);
    }

    public function pedidos(){
       return Pedido::where('cliente_id','=', auth()->user()->cliente()->id)->orderBy('id','desc')->get();
    }

    public function ult5pedidos(){
        return Pedido::where('cliente_id', $this->id)->orderByDesc('id')->take(5);
    }

    public static function quantidadeClientes(){

        $clientes = Cliente::where('created_at', '>', date("Y-m-d",strtotime(date("Y-m-d")."-7 day")))->get();
        return $clientes->count();
    }


}
