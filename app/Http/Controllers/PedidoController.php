<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\User;
use App\Models\Pedido;
use App\Models\PedidoItem;

class PedidoController extends Controller
{
    public function index(){
        return view('pedido.index')->with(['pedidos'=>Pedido::orderByDesc('id')->paginate(5)]);
    }

    public function show(Pedido $pedido){
        return view('pedido.show')->with(['pedido' => $pedido, 'itens' => $pedido->itens()->get()]);
    }

    public function update(Request $request, Pedido $pedido){

        $pedido->update([
            'ds_status' => $request->ds_status,
        ]);

        //Para dar um retorno para o usuário
        session() -> flash('valido', "Pedido $pedido->id foi atualizado com sucesso!");
        return redirect(route('pedido.index'));
    }

    public function filtro(Request $request){
        $pedidos = Pedido::where('id', '>', '0');

        if($request->codigo != ''){
            $pedidos = $pedidos->where('id','=', $request->codigo );
        }

        if($request->cpf != ''){
            $cliente = Cliente::where('ds_cpf','=', $request->cpf)->first();
            $pedidos = $pedidos->where('cliente_id','=', $cliente->id );
        }

        if($request->status != ''){
            $pedidos = $pedidos->where('ds_status','=', $request->status );
        }


        return view('pedido.index')->with('pedidos', $pedidos->paginate(5));
    }

}
