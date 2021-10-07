<?php

namespace App\Http\Controllers;

use App\Models\UsuarioAdmin;
use Illuminate\Http\Request;

class UsuarioAdminController extends Controller
{
    public function index()
    {
        return view('usuario.index')->with('clientes', UsuarioAdmin::paginate(5));
    }

    public function create()
    {
        return view('usuario.create');
    }

    public function store(Request $request)
    {
        UsuarioAdmin::create($request -> all());
        session() -> flash('valido', "Usuario Admin foi adicionada com sucesso!");
        return redirect(route('usuario.index'));
    }


    public function edit(UsuarioAdmin $usuarioAdmin)
    {
        return view('usuario.edit') -> with('usuario', $usuarioAdmin);
    }

    public function update(Request $request, UsuarioAdmin $usuarioAdmin)
    {
        $usuarioAdmin->update($request -> all());

        session() -> flash('valido', "Usuario Admin $usuarioAdmin->id foi adicionada com sucesso!");
        return redirect(route('usuario.index'));

    }

    public function destroy(UsuarioAdmin $usuarioAdmin)
    {
        $usuarioAdmin -> delete();

        session() -> flash('valido', "Usuario Admin $usuarioAdmin->id foi deletada com sucesso!");
        return redirect(route('usuario.index'));
    }
}
