<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Endereco;
use App\Models\Cliente;

class ApiEnderecoController extends Controller
{
    public function index(){
        return response()->json(Endereco::all());
    }


    public function store(Request $request){

        $cliente = Cliente::where('user_id', auth('sanctum')->user()->id)->first();

        $endereco = Endereco::create([
            'ds_endereco'   => $request->ds_endereco,
            'ds_numero'     => $request->ds_numero,
            'ds_bairro'     => $request->ds_bairro,
            'ds_cidade'     => $request->ds_cidade,
            'ds_uf'         => $request->ds_uf,
            'ds_cep'        => $request->ds_cep,
            'ds_complemento'=> $request->ds_complemento,
            'cliente_id'    => $cliente->id
        ]);

        return response()->json($endereco);
    }

    public function show(Endereco $endereco)
    {
        return response()->json(Endereco::where('id',$endereco->id)->get());
    }


    public function update(Request $request, Endereco $endereco){

        $endereco->update($request->all());

        return response()->json($endereco);
    }

    public function destroy (Endereco $endereco){

        $endereco->delete();

        return response()->json($endereco);
    }
}
