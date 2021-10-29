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

    public static function quantidadePedidos(){

        $pedidos = Pedido::where('created_at', '>', date("Y-m-d",strtotime(date("Y-m-d")."-7 day")))->get();
        return $pedidos->count();
    }

    public static function valorPedidos(){

        $pedidos = Pedido::where('created_at', '>', date("Y-m-d",strtotime(date("Y-m-d")."-7 day")))->get();

        $total = 0;
        foreach($pedidos as $pedido){
            $total += $pedido->vl_total;
        }

        return $total;
    }

    public static function qtPedidosPendetes(){

        $pedidos = Pedido::Where('ds_status','=','Em Aberto')->orWhere('ds_status','=','Em Atendimento')
        ->orWhere('ds_status','=','Em Separação')->get();

        return $pedidos->count();
    }

    public static function valorPedidoMes(){

        $pedidos = Pedido::whereMonth('created_at', date("m"));
        $pedidos = $pedidos->whereYear('created_at', date("Y"))->get();

        $total = 0;
        foreach($pedidos as $pedido){
            $total += $pedido->vl_total;
        }

        return $total;
    }

}
