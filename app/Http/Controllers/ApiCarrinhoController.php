<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Cliente;
use App\Models\User;
use App\Models\Carrinho;

class ApiCarrinhoController extends Controller
{
    public function add(Produto $produto){

        //Verificando se já existe o item e o cliente no carrinho
        $cliente = Cliente::where('user_id', auth('sanctum')->user()->id)->first();
        $item = Carrinho::where([
                                    ['produto_id', '=', $produto->id],
                                    ['cliente_id', '=', $cliente->id],
                                ])->first();

        if($item){

                //Adicionando a quantidade do item
                $item->update([
                    'qt_produto' => $item->qt_produto + 1
                ]);
                return response()->json($item);

        }else{

                //Adicionando no carrinho o produto
                $carrinho =Carrinho::create([

                    //Função para verificar qual é o cliente
                    'cliente_id'       => $cliente->id,
                    'produto_id'    => $produto->id,
                    'qt_produto'      => 1

                ]);

                return response()->json($carrinho);

            }
    }

    public function remove(Produto $produto){

       //Verificando se já existe o item e o cliente no carrinho
       $cliente = Cliente::where('user_id', auth('sanctum')->user()->id)->first();
       $item = Carrinho::where([
                    ['produto_id', '=', $produto->id],
                    ['cliente_id', '=', $cliente->id],
                ])->first();

       if($item->qt_produto > 1){

            //removendo a quandidade do item
            $item->update([
                'qt_produto' => $item->qt_produto - 1
            ]);
            return response()->json($item);

       }else{

            //Deletando o item do carrinho
            $item->delete();
            return response()->json($item);

        }
    }

    public function delete(Produto $produto){

        //Verificando se já existe o item e o cliente no carrinho
        $cliente = Cliente::where('user_id', auth('sanctum')->user()->id)->first();
        $item = Carrinho::where([
                     ['produto_id', '=', $produto->id],
                     ['cliente_id', '=', $cliente->id],
                 ])->first();

        if($item){
             //Deletando o item do carrinho
             $item->delete();
             return response()->json($item);
        }
     }

    public function show(){

        $cliente = Cliente::where('user_id', auth('sanctum')->user()->id)->first();
        $carrinho = Carrinho::where('cliente_id', '=' , $cliente->id)->get();

        return response()->json([
            "Quantidade" => Carrinho::quantidade(),
            "Valor" => number_format(Carrinho::totalCarrinho(), 2, ',', '.'),
            "itens" => $carrinho
        ]);


    }

    public function infoCarrinho(){

        $cliente = Cliente::where('user_id', auth('sanctum')->user()->id)->first();
        $carrinho = Carrinho::where('cliente_id', '=' , $cliente->id)->get();



    }

}
