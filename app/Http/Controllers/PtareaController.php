<?php

namespace App\Http\Controllers;

use App\Models\Ptarea;
use App\Models\Proyecto;
use Illuminate\Http\Request;

class PtareaController extends Controller
{
    public function index()
    {
        $ptareas = Ptarea::all();
        return view('ptareas.index', compact('ptareas'));
    }

    public function create()
    {
        $proyectos = Proyecto::all();
        return view('ptareas.create', compact('proyectos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'proyecto_id' => 'required|exists:proyectos,id',
            'descripcion' => 'required',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
        ]);

        Ptarea::create($request->all());

        return redirect()->route('ptareas.index')->with('success', 'Tarea creada con éxito.');
    }

    public function show(Ptarea $ptarea)
    {
        return view('ptareas.show', compact('ptarea'));
    }

    public function edit(Ptarea $ptarea)
    {
        $proyectos = Proyecto::all();
        return view('ptareas.edit', compact('ptarea', 'proyectos'));
    }

    public function update(Request $request, Ptarea $ptarea)
    {
        $request->validate([
            'proyecto_id' => 'required|exists:proyectos,id',
            'descripcion' => 'required',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
        ]);

        $ptarea->update($request->all());

        return redirect()->route('ptareas.index')->with('success', 'Tarea actualizada con éxito.');
    }

    public function destroy(Ptarea $ptarea)
    {
        $ptarea->delete();

        return redirect()->route('ptareas.index')->with('success', 'Tarea eliminada con éxito.');
    }
}
