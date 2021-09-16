<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Categoria;
use App\Models\Tag;
use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{

    public function index()
    {
        return view('produto.index')->with(['produtos'=>Produto::paginate(10) ,'categories'=>Categoria::all()]);
    }

    public function create()
    {
        return view('produto.create')->with(['categories' => Categoria::all(), 'tags' => Tag::all(), 'marcas'=>Marca::all()]);
    }

    public function store(Request $request)
    {
        //Ajustando as imagens do produto
        if($request->ds_foto){
            $foto1 = $request->file('ds_foto')->store('produtos');
            $foto1 = "storage/" . $foto1;
            dd($foto1);

        }else{
            $foto1 = "storage/sem.jpg";
        }


        $produto = Produto::create([
            'ds_nome'       => $request->ds_nome,
            'ds_descricao'  => $request->ds_descricao,
            'vl_produto'    => $request->vl_produto,
            'qt_estoque'    => $request->qt_estoque,
            'tg_destaque'   => $request->tg_destaque,
            'categoria_id'  => $request->categoria_id,
            'marca_id'      => $request->marca_id,
            'ds_dimensoes'  => $request->ds_dimensoes,
            'ds_peso'       => $request->ds_peso,
            'ds_material'   => $request->ds_material,
            'ds_foto'       => $foto1

        ]);

        $produto->tags()->sync($request->tags);
        //Para dar um retorno para o usuário
        session() -> flash('valido', 'Produto foi cadastrado com sucesso!');

        return redirect(route('produto.index'));
    }

    public function show(Produto $produto)
    {
        //
    }

    public function edit(Produto $produto)
    {
        //
    }

    public function update(Request $request, Produto $produto)
    {
        //
    }

    public function destroy(Produto $produto)
    {
        $produto -> delete();

        //Para dar um retorno para o usuário
        session() -> flash('valido', "Produto $produto->id foi deletado com sucesso!");
        return redirect(route('produto.index'));
    }
}
