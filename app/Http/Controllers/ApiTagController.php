<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class ApiTagController extends Controller
{
    public function index()
    {
        return response()->json(Tag::all());
    }

    public function show(Tag $tag)
    {
        return response()->json(Tag::where('id',$tag->id)->get());
    }

    public function produtos(Tag $tag)
    {
        return response()->json($tag->produtos()->with('tags')->with('categoria')->with('marca')->get());
    }
}
