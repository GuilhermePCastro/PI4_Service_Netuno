<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{

    public function index()
    {
        return view('categoria.index')->with('categoria', Categoria::paginate(5));
    }

    public function create()
    {
        return view('categoria.create');
    }


    public function store(Request $request)
    {
        Categoria::create($request -> all());

        //Para dar um retorno para o usuário
        session() -> flash('valido', "Categoria foi adicionada com sucesso!");
        return redirect(route('categoria.index'));
    }

    public function show(Categoria $categoria)
    {
        //
    }

    public function edit(Categoria $categoria)
    {
        return view('categoria.edit') -> with('categoria', $categoria);
    }

    public function update(Request $request, Categoria $categoria)
    {

        $categoria->update($request -> all());

        session() -> flash('valido', "Categoria $categoria->id foi alterada com sucesso!");
        return redirect(route('categoria.index'));
    }

    public function destroy(Categoria $categoria)
    {
        /*if($categoria->produtos()->count() > 0){
            session()->flash('invalido', "Não pode apagar categoria que tenha produto vinculado!");
            return redirect(route('categoria.index'));
        }*/

        $categoria -> delete();

        //Para dar um retorno para o usuário
        session() -> flash('valido', "Categoria $categoria->id foi deletada com sucesso!");
        return redirect(route('categoria.index'));
    }

    public function filtro(Request $request){

        $categories = Categoria::where('id', '>', '0');

        if($request->nome != ''){
            $categories = $categories->where('ds_categoria','like', '%' . $request->nome . '%');
        }

        if($request->codigo != ''){
            $categories = $categories->where('id','=', $request->codigo );
        }

        return view('categoria.index')->with(['categoria' => $categories->paginate(5)]);

    }

}
