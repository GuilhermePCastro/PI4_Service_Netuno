<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Categoria;
use App\Models\Tag;
use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ApiProdutoController extends Controller
{
    public function index()
    {
        return response()->json(Produto::with('tags')->with('categoria')->with('marca')->get());
    }

    public function show(Produto $produto)
    {
        return response()->json(Produto::with('tags')->with('categoria')->with('marca')->where('id',$produto->id)->get());
    }

    public function destaques()
    {
        return response()->json(Produto::with('tags')->with('categoria')->with('marca')->where('tg_destaque',1)->get());
    }

    public function filtro(Request $request){

        $produtos = Produto::where('id', '>', '0');

        if($request->nome != ''){
            $produtos = $produtos->where('ds_nome','like', '%' . $request->nome . '%');
        }

        return response()->json($produtos->with('tags')->with('categoria')->with('marca')->get());

    }


}
