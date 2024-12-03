<?php

namespace App\Http\Controllers;

use App\Models\HistorialMedico;
use App\Models\Mascota;
use Illuminate\Http\Request;

class HistorialMedicoController extends Controller
{
    public function index()
{
    $mascotas = Mascota::all();
    $historiales = HistorialMedico::with('mascota')->get();

    return view('historial_medico', compact('mascotas', 'historiales'));
}


    public function create()
    {
        $mascotas = Mascota::all();
        return view('historial_medico.create', compact('mascotas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mascota_id' => 'required|exists:mascotas,id',
            'diagnostico' => 'required|string',
            'fecha' => 'required|date',
        ]);

        HistorialMedico::create($request->all());

        return redirect()->route('historial_medico.index')->with('success', 'Historial médico agregado exitosamente.');
    }

    public function edit(HistorialMedico $historialMedico)
    {
        $mascotas = Mascota::all();
        return view('historial_medico.edit', compact('historialMedico', 'mascotas'));
    }

    public function update(Request $request, HistorialMedico $historialMedico)
    {
        $request->validate([
            'mascota_id' => 'required|exists:mascotas,id',
            'diagnostico' => 'required|string',
            'fecha' => 'required|date',
        ]);

        $historialMedico->update($request->all());

        return redirect()->route('historial_medico.index')->with('success', 'Historial médico actualizado.');
    }

    public function destroy($id)
    {
        $historialMedico = HistorialMedico::findOrFail($id);
        $historialMedico->update(['activo' => false]);

        return redirect()->route('historial_medico.index')->with('success', 'Historial médico eliminado lógicamente.');
    }
}
