<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_id', 'ds_endereco', 'ds_numero', 'ds_cep', 'ds_cidade','ds_uf', 'ds_complemento', 'vl_total', 'ds_status', 'vl_frete'];
    protected $table = 'tb_pedido';

    public function itens(){
        return $this->HasMany(PedidoItem::class);
    }

    public function cliente(){
        return Cliente::where('id','=', $this->cliente_id)->first();
    }

    public static function ult5pedidos(){
        return Pedido::all()->sortByDesc('created_at')->take(5);
    }

    public static function pedidosAtivos(){
        $cliente = Cliente::where('user_id', auth('sanctum')->user()->id)->first();
        return Pedido::where([
                                ['ds_status','<>','Finalizado'],
                                ['ds_status','<>','Cancelado'],
                                ['cliente_id','=', $cliente->id]
                                ])->orderBy('id','desc')->get();
    }

    public static function pedidosFinalizados(){
        $cliente = Cliente::where('user_id', auth('sanctum')->user()->id)->first();
        return Pedido::where([
                                ['ds_status','=','Finalizado'],
                                ['cliente_id','=', $cliente->id]
                            ])->orderBy('id','desc')->get();
    }

    public static function pedidosCancelados(){
        $cliente = Cliente::where('user_id', auth('sanctum')->user()->id)->first();
        return Pedido::where([
                                ['ds_status','=','Cancelado'],
                                ['cliente_id','=', $cliente->id]
                            ])->orderBy('id','desc')->get();
    }
}
