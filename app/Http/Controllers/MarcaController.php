<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('marca.index')->with('marca', Marca::paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marca.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Marca::create($request -> all());

        //Para dar um retorno para o usuário
        session() -> flash('valido', "Marca foi adicionada com sucesso!");
        return redirect(route('marca.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function show(Marca $marca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function edit(Marca $marca)
    {
        return view('marca.edit') -> with('marca', $marca);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marca $marca)
    {
        $marca->update($request -> all());

        session() -> flash('valido', "Marca $marca->id foi alterada com sucesso!");
        return redirect(route('marca.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marca $marca)
    {
        /*if($categoria->produtos()->count() > 0){
            session()->flash('invalido', "Não pode apagar categoria que tenha produto vinculado!");
            return redirect(route('categoria.index'));
        }*/

        $marca -> delete();

        //Para dar um retorno para o usuário
        session() -> flash('valido', "Marca $marca->id foi deletada com sucesso!");
        return redirect(route('marca.index'));
    }


    public function filtro(Request $request){

        $marcas = Marca::where('id', '>', '0');

        if($request->nome != ''){
            $marcas = $marcas->where('ds_marca','like', '%' . $request->nome . '%');
        }

        if($request->codigo != ''){
            $marcas = $marcas->where('id','=', $request->codigo );
        }

        if($request->filtro != ''){
            $marcas = $marcas->where('tg_filtro','=', $request->filtro );
        }

        return view('marca.index')->with(['marca' => $marcas->paginate(10)]);

    }
}
