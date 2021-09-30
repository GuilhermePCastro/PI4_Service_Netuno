<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class ApiCategoriaController extends Controller
{
    public function index()
    {
        return response()->json(Categoria::all());
    }

    public function show(Categoria $categoria)
    {
        return response()->json(Categoria::where('id',$categoria->id)->get());
    }

    public function produtos(Categoria $categoria)
    {
        return response()->json($categoria->produtos()->with('tags')->with('categoria')->with('marca')->get());
    }

}
