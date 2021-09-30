<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;

class ApiMarcaController extends Controller
{
    public function index()
    {
        return response()->json(Marca::all());
    }

    public function show(Marca $marca)
    {
        return response()->json(Marca::where('id',$marca->id)->get());
    }

    public function produtos(Marca $marca)
    {
        return response()->json($marca->produtos()->with('tags')->with('categoria')->with('marca')->get());
    }
}
