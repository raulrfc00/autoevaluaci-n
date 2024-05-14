<?php

namespace App\Http\Controllers;

use App\Models\Cicle;
use Illuminate\Http\Request;
use App\Http\Resources\CicleResource;

class CicleController extends Controller
{
    /**
     * Display a listing of the resource.
     * Muestra una lista de todos los recursos.
     */
    public function index()
    {
        $cicles = Cicle::all();
        return CicleResource::collection($cicles);
    }

    /**
     * Show the form for creating a new resource.
     * Muestra el formulario para crear un nuevo recurso.
     */
    public function create()
    {
        return view('cicles.create');
    }

    /**
     * Store a newly created resource in storage.
     * Almacena un nuevo recurso creado en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'sigles' => 'required|max:255',
            'descripcio' => 'required',
            'actiu' => 'required|boolean'
        ]);

        $cicle = new Cicle($request->all());
        $cicle->save();

        return redirect()->route('cicles.index')->with('success', 'Cicle created successfully.');
    }

    /**
     * Display the specified resource.
     * Muestra el recurso especificado.
     */
    public function show(Cicle $cicle)
    {
        return new CicleResource($cicle);
    }

    /**
     * Show the form for editing the specified resource.
     * Muestra el formulario para editar el recurso especificado.
     */
    public function edit(Cicle $cicle)
    {
        return view('cicles.edit', compact('cicle'));
    }

    /**
     * Update the specified resource in storage.
     * Actualiza el recurso especificado en la base de datos.
     */
    public function update(Request $request, Cicle $cicle)
    {
        $request->validate([
            'sigles' => 'required|max:255',
            'descripcio' => 'required',
            'actiu' => 'required|boolean'
        ]);

        $cicle->save();

        return redirect()->route('cicles.index')->with('success', 'Cicle updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * Elimina el recurso especificado de la base de datos.
     */
    public function destroy(Cicle $cicle)
    {
        $cicle->delete();
        return redirect()->route('cicles.index')->with('success', 'Cicle deleted successfully.');
    }
}
