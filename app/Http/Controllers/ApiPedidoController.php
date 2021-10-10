<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrinho;
use App\Models\Cliente;
use App\Models\User;
use App\Models\Pedido;
use App\Models\PedidoItem;

class ApiPedidoController extends Controller
{
    public function add(Request $request){

        //Pegando o carrinho
        $cliente = Cliente::where('user_id', auth('sanctum')->user()->id)->first();
        $carrinho = Carrinho::where('cliente_id', '=', $cliente->id)->get();


        //Criar o pedido
        $pedido = Pedido::create([
            'cliente_id' => $cliente->id,
            'ds_endereco' => $request->ds_endereco,
            'ds_numero' => $request->ds_numero,
            'ds_cep' => $request->ds_cep,
            'ds_bairro' => $request->ds_bairro,
            'ds_cidade' => $request->ds_cidade,
            'ds_uf' => $request->ds_uf,
            'ds_complemento' => $request->ds_complemento,
            'vl_total' => $request->vl_total,
            'ds_status' => 'Em aberto',
            'vl_frete' => $request->vl_frete,
        ]);

        foreach($carrinho as $item){
            PedidoItem::create([
                'pedido_id' => $pedido->id,
                'produto_id' => $item->produto_id,
                'qt_produto' => $item->qt_produto,
                'vl_produto' => $item->produto()->vl_produto,
            ]);

            $item->delete();
        }

        return response()->json(Pedido::with('itens')->where('id',$pedido->id)->get());
    }

    public function show(Pedido $pedido){
        return response()->json(Pedido::with('itens')->where('id',$pedido->id)->get());
    }

    public function index(){
        return response()->json(Pedido::with('itens')->get());
    }


}
