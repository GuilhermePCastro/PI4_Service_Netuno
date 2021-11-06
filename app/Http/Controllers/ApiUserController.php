<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ApiUserController extends Controller
{
    function login(Request $request){

        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            return response()->json([
                'error' => 'Crendências Inválidas!'
            ], 401);
        }

        //Token de acesso
        return response()->json([
            'token' => $user->createToken($request->device)->plainTextToken
        ]);

    }

    public function index(){
        return response()->json(User::all());
    }

    public function store(Request $request){

        //Validando os dados
        $request->validate([
            'email' => 'required|email|unique:users',
            'name' => 'required|max:255',
            'password' => 'required|min:8',
            'device' => 'required'
        ]);

        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'device' => $request->device
        ]);


        if($user){
            return response()->json([
                'user' => $user
            ]);
        }else{
            return response()->json([
                'error' => 'Erro ao cadastrar usuário!',

            ],401);
        }
    }

    public function show()
    {
        if(auth('sanctum')->user()){
            return response()->json(auth('sanctum')->user());
        }else{
            return response()->json([
                'error' => 'Sem autenticação!'
            ], 401);
        }

    }

    public function showUnique(User $user)
    {
        return response()->json(User::where('id',$user->id)->get());
    }

    public function update(User $user, Request $request){

        //Validando os dados
        $request->validate([
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),],
            'name' => 'required|max:255',
            'password' => 'required|min:8',
            'device' => 'required'
        ]);

        $user->update([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'device' => $request->device
        ]);

        if($user){
            return response()->json([
                'user' => $user,
                'token' => $user->createToken($request->device)->plainTextToken
            ]);
        }else{
            return response()->json([
                'error' => 'Erro ao alterar usuário!',

            ],401);
        }
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json($user);
    }

    public function cliente(User $user){

        return response()->json($user->cliente());
    }
}
