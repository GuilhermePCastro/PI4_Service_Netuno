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

            $foto1 = $request->file('ds_foto')->store('/public/produtos');
            $foto1 = str_replace('public/','storage/',$foto1);
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
            'ds_linkfoto'   => $request->ds_linkfoto,
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
        return view('produto.edit')->with(['produto' => $produto, 'categories' => Categoria::all(), 'tags' => Tag::all(), 'marcas'=>Marca::all()]);
    }

    public function update(Request $request, Produto $produto)
    {
        //Ajustando as imagens do produto
        if($request->ds_foto){
            $foto1 =  $request->file('ds_foto')->store('/public/produtos');
            $foto1 = str_replace('public/','storage/',$foto1);

            //Só apaga se não for a padrão
            if($produto->ds_foto != "storage/sem.jpg"){

                Storage::delete(str_replace('storage/','public/',$produto->ds_foto));
            }
        }else{
            $foto1 = $produto->ds_foto;
        }

        $produto->update([
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
            'ds_linkfoto'   => $request->ds_linkfoto,
            'ds_foto'       => $foto1

        ]);

        $produto->tags()->sync($request->tags);

        //Para dar um retorno para o usuário
        session() -> flash('valido', "Produto $produto->id foi alterado com sucesso!");

        return redirect(route('produto.index'));
    }

    public function destroy(Produto $produto)
    {
        $produto -> delete();

        //Para dar um retorno para o usuário
        session() -> flash('valido', "Produto $produto->id foi deletado com sucesso!");
        return redirect(route('produto.index'));
    }

    public function filtro(Request $request){

        $produtos = Produto::where('id', '>', '0');

        if($request->nome != ''){
            $produtos = $produtos->where('ds_nome','like', '%' . $request->nome . '%');
        }

        if($request->codigo != ''){
            $produtos = $produtos->where('id','=', $request->codigo );
        }

        if($request->categoria_id != ''){
            $produtos = $produtos->where('categoria_id','=', $request->categoria_id );
        }

        return view('produto.index')->with(['produtos' => $produtos->paginate(5), 'categories'=>Categoria::all()]);
    }

    public function trash()
    {
        return view('produto.trash')->with(['produtos'=>Produto::onlyTrashed()->get(), 'categories'=>Categoria::all()]);
    }

    public function restore($id)
    {
        $produto = Produto::onlyTrashed()->where('id', $id)->firstOrFail();
        $produto->restore();

        session() -> flash('valido', "produto $produto->id foi restaurado com sucesso!");
        return redirect(route('produto.trash'));

    }
}
