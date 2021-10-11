<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UsuarioAdminController extends Controller
{
    public function index()
    {
        return view('usuario.index')->with('user', User::paginate(5));
    }

    public function create()
    {
        return view('usuario.create');
    }

    public function store(Request $request)
    {
        User::create($request -> all());
        session() -> flash('valido', "Usuario Admin foi adicionada com sucesso!");
        return redirect(route('usuario.index'));
    }


    public function edit(User $user)
    {
        return view('usuario.edit') -> with('usuario', $user);
    }

    public function update(Request $request, User $user)
    {
        $user->update($request -> all());

        session() -> flash('valido', "Usuario Admin $user->id foi adicionada com sucesso!");
        return redirect(route('usuario.index'));

    }

    public function destroy(User $user)
    {
        $user -> delete();

        session() -> flash('valido', "Usuario Admin $user->id foi deletada com sucesso!");
        return redirect(route('usuario.index'));
    }

    public function filtro(Request $request){
        $user = User::where('id', '>', '0');

        if($request->nome != ''){
            $user = $user->where('nome','like', '%' . $request->nome . '%');
        }


        return view('usuario.index')->with(['user' => $user->paginate(10)]);
    }
}
