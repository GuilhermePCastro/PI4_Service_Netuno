<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ApiClienteController extends Controller
{
    public function index(){
        return response()->json(Cliente::all());
    }


    public function store(Request $request){

        $cliente = Cliente::create([
            'user_id'   => auth('sanctum')->user()->id,
            'ds_nome'   => $request->ds_nome,
            'ds_cpf'    => $request->ds_cpf,
            'ds_celular'=> $request->ds_celular,
            'ds_email'  => auth('sanctum')->user()->email
        ]);

        return response()->json($cliente);
    }

    public function show(Cliente $cliente)
    {
        return response()->json(Cliente::where('id',$cliente->id)->get());
    }


    public function update(Request $request, Cliente $cliente){

        $cliente->update([
            'user_id'   => auth('sanctum')->user()->id,
            'ds_nome'   => $request->ds_nome,
            'ds_cpf'    => $request->ds_cpf,
            'ds_celular'=> $request->ds_celular,
            'ds_email'  => auth('sanctum')->user()->email
        ]);

        //Alterando os dados de usuário
        $user = User::where('id','=',$cliente->user_id)->first();
        $user->update([
            'name' => $request->ds_nome,
            'password' => Hash::make($request->password),
        ]);

        return response()->json($cliente);
    }

    public function destroy (Cliente $cliente){

        $cliente->delete();
        //$user = User::where('id','=',$cliente->user_id)->first();
        //$user->delete();

        return response()->json($cliente);
    }

}
