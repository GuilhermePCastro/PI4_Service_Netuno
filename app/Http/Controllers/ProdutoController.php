<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Categoria;
use App\Models\Tag;
use App\Models\Marca;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{

    public function index()
    {
        return view('produto.index')->with(['produtos'=>Produto::paginate(5) ,'categories'=>Categoria::all()]);
    }

    public function create()
    {
        return view('produto.create')->with(['categories' => Categoria::all(), 'tags' => Tag::all(), 'marcas'=>Marca::all()]);
    }

    public function store(Request $request)
    {
        //Ajustando as imagens do produto
        if($request->ds_foto){
            $foto1 = "storage/" . $request->file('ds_foto')->store('produtos');
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
        //
    }
}
