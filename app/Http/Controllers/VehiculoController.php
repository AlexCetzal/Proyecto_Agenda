<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;  // Asegúrate de importar el modelo
use Illuminate\Http\Request;
use App\Models\Campo;
use App\Models\Ubicaciones;
use App\Models\UbicacionesMontejos;

class VehiculoController extends Controller
{
    public function index()
{
    $vehiculos = Vehiculo::all();
    return view('catalogo_eventos.vehiculos', compact('vehiculos'));
}

public function getSelect(Request $request)
{
    $section = strtolower($request->query('section'));
        if ($section == 'campos_modelo') {
            $data = Campo::all(); 
        }
        if ($section == 'actividades_modelo') {
            $data = Ubicaciones::all();
        }
        if ($section == 'transporte') { 
            $data = Vehiculo::all();  
        } 
        if ($section == 'centro_cultural') {
            $data = UbicacionesMontejos::all();
        }

        return response()->json($data);
}


    public function store(Request $request)
    {
        $request->validate([
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'placa' => 'required|string|max:255|unique:vehiculos',
        ]);

        Vehiculo::create($request->all());

        return redirect()->route('vehiculos.index')->with('success', 'Vehículo añadido.');
    }

    public function update(Request $request, Vehiculo $vehiculo)
    {
        $request->validate([
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'placa' => 'required|string|max:255|unique:vehiculos,placa,' . $vehiculo->id,
        ]);

        $vehiculo->update($request->all());

        return redirect()->route('vehiculos.index')->with('success', 'Vehículo actualizado.');
    }

    public function destroy(Vehiculo $vehiculo)
    {
        $vehiculo->delete();

        return redirect()->route('vehiculos.index')->with('success', 'Vehículo eliminado.');
    }
}
