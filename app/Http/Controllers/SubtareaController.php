<?php

namespace App\Http\Controllers;

use App\Models\Subtarea;
use App\Models\Ptarea;
use Illuminate\Http\Request;

class SubtareaController extends Controller
{
    public function index()
    {
        $subtareas = Subtarea::all();
        return view('subtareas.index', compact('subtareas'));
    }

    public function create()
    {
        $ptareas = Ptarea::all();
        return view('subtareas.create', compact('ptareas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ptarea_id' => 'required|exists:ptareas,id',
            'descripcion' => 'required',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
        ]);

        Subtarea::create($request->all());

        return redirect()->route('subtareas.index')->with('success', 'Subtarea creada con éxito.');
    }

    public function show(Subtarea $subtarea)
    {
        return view('subtareas.show', compact('subtarea'));
    }

    public function edit(Subtarea $subtarea)
    {
        $ptareas = Ptarea::all();
        return view('subtareas.edit', compact('subtarea', 'ptareas'));
    }

    public function update(Request $request, Subtarea $subtarea)
    {
        $request->validate([
            'ptarea_id' => 'required|exists:ptareas,id',
            'descripcion' => 'required',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
        ]);

        $subtarea->update($request->all());

        return redirect()->route('subtareas.index')->with('success', 'Subtarea actualizada con éxito.');
    }

    public function destroy(Subtarea $subtarea)
    {
        $subtarea->delete();

        return redirect()->route('subtareas.index')->with('success', 'Subtarea eliminada con éxito.');
    }
}
