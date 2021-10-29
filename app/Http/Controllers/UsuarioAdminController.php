<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class UsuarioAdminController extends Controller
{
    public function index()
    {
        return view('usuario.index')->with('user', User::where('IsAdmin',1)->paginate(10));
    }

    public function create()
    {
        return view('usuario.create');
    }

    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'IsAdmin' => 1,
            'password' => Hash::make($request->password)
        ]);
        session() -> flash('valido', "Usuario foi adicionada com sucesso!");
        return redirect(route('usuario.index'));
    }

    public function edit(User $user)
    {
        return view('usuario.edit') -> with('usuario', $user);
    }

    public function update(Request $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        session() -> flash('valido', "Usuario $user->id foi adicionada com sucesso!");
        return redirect(route('usuario.index'));
    }

    public function destroy(User $user)
    {
        $user -> delete();

        session() -> flash('valido', "Usuario $user->id foi deletada com sucesso!");
        return redirect(route('usuario.index'));
    }

    public function filtro(Request $request){
        $user = User::where('id', '>', '0');

        if($request->email != ''){
            $user = $user->where('email','like', '%' . $request->email . '%');
        }

        if($request->user != ''){
            $user = $user->where('id','=', $request->user);
        }
        return view('usuario.index')->with(['user' => $user->paginate(10)]);
    }
}
