<?php

namespace App\Http\Controllers;

use App\Models\Neumatico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NeumaticoController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $neumaticos = $user->role === 'admin'
            ? Neumatico::latest()->get()
            : Neumatico::where('area', $user->role)->latest()->get();

        return view('neumaticos.index', compact('neumaticos'));
    }

    public function create()
    {
        $areas = ['slw', 'qet', 'butc'];
        $estados = ['nuevo', 'en_uso', 'desgaste', 'baja'];
        return view('neumaticos.create', compact('areas', 'estados'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'codigo'        => ['required', 'string', 'max:100', 'unique:neumaticos,codigo'],
            'marca'         => ['required', 'string', 'max:100'],
            'medida'        => ['required', 'string', 'max:50'],
            'estado'        => ['required', 'in:nuevo,en_uso,desgaste,baja'],
            'area'          => ['required_if:role,admin', 'in:slw,qet,butc'],
            'observaciones' => ['nullable', 'string', 'max:500'],
        ]);

        // Si no es admin, asignar automáticamente el área del usuario
        $data['area'] = $user->role === 'admin' ? $request->area : $user->role;

        Neumatico::create($data);

        return redirect()->route('neumaticos.index')->with('success', 'Neumático registrado correctamente.');
    }

    public function show(Neumatico $neumatico)
    {
        $this->authorizeArea($neumatico);
        return view('neumaticos.show', compact('neumatico'));
    }

    public function edit(Neumatico $neumatico)
    {
        $this->authorizeArea($neumatico);
        $areas = ['slw', 'qet', 'butc'];
        $estados = ['nuevo', 'en_uso', 'desgaste', 'baja'];
        return view('neumaticos.edit', compact('neumatico', 'areas', 'estados'));
    }

    public function update(Request $request, Neumatico $neumatico)
    {
        $this->authorizeArea($neumatico);
        $user = Auth::user();

        $data = $request->validate([
            'codigo'        => ['required', 'string', 'max:100', 'unique:neumaticos,codigo,' . $neumatico->id],
            'marca'         => ['required', 'string', 'max:100'],
            'medida'        => ['required', 'string', 'max:50'],
            'estado'        => ['required', 'in:nuevo,en_uso,desgaste,baja'],
            'area'          => ['required_if:role,admin', 'in:slw,qet,butc'],
            'observaciones' => ['nullable', 'string', 'max:500'],
        ]);

        if ($user->role !== 'admin') {
            unset($data['area']);
        }

        $neumatico->update($data);

        return redirect()->route('neumaticos.index')->with('success', 'Neumático actualizado correctamente.');
    }

    public function destroy(Neumatico $neumatico)
    {
        $this->authorizeArea($neumatico);
        $neumatico->delete();

        return redirect()->route('neumaticos.index')->with('success', 'Neumático eliminado correctamente.');
    }

    private function authorizeArea(Neumatico $neumatico): void
    {
        $user = Auth::user();
        if ($user->role !== 'admin' && $neumatico->area !== $user->role) {
            abort(403, 'No autorizado.');
        }
    }
}
