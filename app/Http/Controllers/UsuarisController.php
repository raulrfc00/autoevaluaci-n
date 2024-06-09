<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Usuari;
use Illuminate\Http\Request;
use App\Http\Resources\UsuariResource;

class UsuarisController extends Controller
{
    public function index()
    {
        $usuaris = Usuari::all();
        return UsuariResource::collection($usuaris);
    }

    public function showlogin()
    {
        return view('auth.login');
    }

    public function login()
    {
        $username = $request->input('username');
        $contrasenya = $request->input('nostrasenya');

        $user = Usuari::Where('username', $username)->first();

        if ($user != null && Hash::check('contrasenya', $user->contrasenya)){
            Auth::login($user);
            $response = redirect('/home');
        }else{
            $request->session()->flash('error', 'usuari o contrasenya incorrectes');
            $response = redirect('/login')->whitInput();
        }
        return $response;

    }

    public function create()
    {
        return view('usuaris.create');
    }

    public function store(Request $request)
    {
        $usuari = new Usuari();
        $usuari->nom_usuari = $request->input('nom_usuari');
        $usuari->contrasenya = $request->input('contrasenya');
        $usuari->correu = $request->input('correu');
        $usuari->nom = $request->input('nom');
        $usuari->cognom = $request->input('cognom');
        $usuari->actiu = $request->input('actiu');
        $usuari->tipus_usuaris_id = $request->input('tipus_usuaris_id');

        $usuari->save();

        return response()->json(['message' => 'Usuari created successfully.', 'data' => $usuari], 201);
    }

    public function show(Usuari $usuari)
    {
        return new UsuariResource($usuari);
    }

    public function edit(Usuari $usuari)
    {
        return view('usuaris.edit', compact('usuari'));
    }

    public function update(Request $request, Usuari $usuari)
    {
        $usuari->nom_usuari = $request->input('nom_usuari');
        $usuari->contrasenya = $request->input('contrasenya');
        $usuari->correu = $request->input('correu');
        $usuari->nom = $request->input('nom');
        $usuari->cognom = $request->input('cognom');
        $usuari->actiu = $request->input('actiu');
        $usuari->tipus_usuaris_id = $request->input('tipus_usuaris_id');

        $usuari->save();

        return response()->json(['message' => 'Usuari updated successfully.', 'data' => $usuari], 200);
    }

    public function destroy(Usuari $usuari)
    {
        try {
            $usuari->delete();
            return response()->json(['message' => 'Usuari deleted successfully.'], 200);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error deleting usuari.'], 500);
        }
    }
}
