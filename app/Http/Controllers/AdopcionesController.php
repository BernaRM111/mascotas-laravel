<?php

namespace App\Http\Controllers;

use App\Models\Adopcion;
use App\Models\Mascota;
use Illuminate\Http\Request;

class AdopcionesController extends Controller
{
    public function index()
    {
        $adopciones = Adopcion::with('mascota')->get();
        $mascotas = Mascota::doesntHave('adopciones')->get();
        $mascotas = Mascota::all();
        return view('adopciones', compact('adopciones', 'mascotas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mascota_id' => 'required|exists:mascotas,id',
            'adoptante_nombre' => 'required|string|max:255',
            'adoptante_contacto' => 'required|string|max:255',
            'fecha_adopcion' => 'required|date',
        ]);

        Adopcion::create($request->all());
        return redirect()->route('adopciones.index')->with('success', 'Adopción registrada exitosamente.');
    }

    public function update(Request $request, $id)
    {
        $adopciones = Adopcion::findOrFail($id);
        $adopciones->update($request->all());
        return redirect()->route('adopciones.index')->with('success', 'Adopción actualizada correctamente.');
    }

    public function destroy($id)
        {
            $adopciones = Adopcion::findOrFail($id);
            $adopciones->update(['activo' => false]);
    
            return redirect()->route('adopciones.index')->with('success', 'Adopciones eliminada lógicamente.');
        }
    
}

