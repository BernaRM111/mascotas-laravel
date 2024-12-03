<?php

namespace App\Http\Controllers;

use App\Models\Vacunacion;
use App\Models\Mascota;
use Illuminate\Http\Request;

class VacunacionController extends Controller
{
    public function index()
    {
        $mascotas = Mascota::all();
        $vacunaciones = Vacunacion::with('mascota')->get();

        return view('vacunacion', compact('mascotas', 'vacunaciones'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'mascota_id' => 'required|exists:mascotas,id',
            'vacuna' => 'required|string|max:255',
            'fecha_aplicacion' => 'required|date',
            'dias_siguiente_dosis' => 'required|integer|min:0',
        ]);

        $data['fecha_proxima_dosis'] = date('Y-m-d', strtotime("{$data['fecha_aplicacion']} +{$data['dias_siguiente_dosis']} days"));

        Vacunacion::create($data);

        return redirect()->route('vacunacion.index')->with('success', 'Vacunación registrada correctamente.');
    }

    public function update(Request $request, $id)
    {
        $vacunacion = Vacunacion::findOrFail($id);

        $data = $request->validate([
            'mascota_id' => 'required|exists:mascotas,id',
            'vacuna' => 'required|string|max:255',
            'fecha_aplicacion' => 'required|date',
            'dias_siguiente_dosis' => 'required|integer|min:0',
        ]);

         $data['fecha_proxima_dosis'] = date('Y-m-d', strtotime("{$data['fecha_aplicacion']} +{$data['dias_siguiente_dosis']} days"));

        $vacunacion->update($data);

        return redirect()->route('vacunacion.index')->with('success', 'Vacunación actualizada correctamente.');
    }


    public function destroy($id)
    {
        $vacunacion = Vacunacion::findOrFail($id);
        $vacunacion->update(['activo' => false]);

        return redirect()->route('vacunacion.index')->with('success', 'Vacunación eliminada lógicamente.');
    }
}
