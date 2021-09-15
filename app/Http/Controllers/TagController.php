<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index()
    {
        return view('tag.index')->with('tag' , Tag::paginate(5));
    }

    public function create()
    {
        return view('tag.create');
    }

    public function store(Request $request)
    {
        Tag::create($request -> all());

        session()->flash('valido', "Tag adicionada com sucesso");
        return redirect(route('tag.index'));
    }

    public function show(Tag $tag)
    {
        //
    }

    public function edit(Tag $tag)
    {
        return view('tag.edit')->with('tag', $tag);
    }

    public function update(Request $request, Tag $tag)
    {
        $tag->update($request -> all());
        session() -> flash('valido', "A tag $tag->id foi alterada com sucesso!");
        return redirect(route('tag.index'));
    }

    public function destroy(Tag $tag)
    {
        if($tag->products()->count() > 0){
            session()->flash('invalido', "Não pode apagar tag que tenha produto vinculado!");
            return redirect(route('tag.index'));
        }

        $tag->delete();
        session() -> flash('valido', "tag $tag->id foi deletado com sucesso!");
        return redirect(route('tag.index'));
    }

    public function restore($id)
    {
        $tag = Tag::onlyTrashed()->where('id', $id)->firstOrFail();
        $tag->restore();

        session() -> flash('valido', "tag $tag->id foi restaurado com sucesso!");
        return redirect(route('tag.trash'));

    }


    public function filtro(Request $request){
        $tags = Tag::where('id', '>', '0');

        if($request->nome != ''){
            $tags = $tags->where('ds_nome','like', '%' . $request->nome . '%');
        }

        if($request->codigo != ''){
            $tags = $tags->where('id','=', $request->codigo );
        }

        return view('tag.index')->with(['tag' => $tags->paginate(5)]);
    }

}
