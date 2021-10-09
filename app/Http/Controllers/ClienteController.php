<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index(){
        return view('cliente.index')->with('clientes', Cliente::paginate(8));
    }

    public function show(Cliente $cliente){
        return view('cliente.show')->with('cliente', $cliente);
    }

    public function filtro(Request $request){
        $clientes = Cliente::where('id', '>', '0');

        if($request->user != ''){
            $clientes = $clientes->where('user_id','=', $request->user);
        }

        if($request->cpf != ''){

            $clientes = $clientes->where('ds_cpf','=', $request->cpf);
        }

        if($request->email != ''){

            $clientes = $clientes->where('ds_email','=', $request->email);
        }

        return view('cliente.index')->with('clientes', $clientes->paginate(8));
    }
}
