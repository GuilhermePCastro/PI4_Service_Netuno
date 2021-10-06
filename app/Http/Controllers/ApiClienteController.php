<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ApiClienteController extends Controller
{
    public function index(){
        return view('cliente.index')->with('clientes', Cliente::paginate(5));
    }

    public function create(){
        return view('cliente.create');
    }

    public function store(Request $request){
        Cliente::create([
            'user_id'   => Auth()->user()->id,
            'ds_nome'   => $request->ds_nome,
            'ds_cpf'    => $request->ds_cpf,
            'ds_celular'=> $request->ds_celular,
            'ds_email'  => $request->ds_email,
            'ds_senha'  => $request->ds_senha,
        ]);

        //Para dar um retorno para o usuário
        session() -> flash('valido', "Dados pessoais atualizados!");
        return redirect('/');

    }

    public function show(Cliente $cliente)
    {
       return view('cliente.show')->with(['cliente' => $cliente, 'usuario' => $cliente->usuario()]);
    }

    public function edit(Cliente $cliente){
        return view('cliente.edit')->with('cliente', $cliente);
    }

    public function update(Request $request, Cliente $cliente){
        $cliente->update([
            'ds_nome'   => $request->ds_nome,
            'ds_cpf'    => $request->ds_cpf,
            'ds_celular'=> $request->ds_celular,
            'ds_email'  => $request->ds_email,
            'ds_senha'  => $request->ds_senha,
        ]);

        //Trocando nome do usuário
       $user = User::where('id', '=', Auth()->user()->id)->first();

       $user->update(['name'=> $request->ds_nome,]);

        session() -> flash('valido', "Dados pessoais atualizados!");
        return redirect(route('cliente.show', $cliente->id));
    }

    public function destroy (Cliente $cliente){

        $cliente -> delete();

        //Para dar um retorno para o usuário
        session() -> flash('valido', "Cliente $cliente->id foi deletado com sucesso!");
        return redirect(route('cliente.show'));
    }

    public function trash(){
        return view('cliente.trash')->with(['clientes'=>Cliente::onlyTrashed()->get()]);
    }

    public function restore($id){
        $cliente = Cliente::onlyTrashed()->where('id',$id)->firstOrFail();
        $cliente->restore();

        session() -> flash('valido', "Cliente $cliente->id foi restaurado com sucesso!");
        return redirect(route('cliente.trash'));
    }
}
