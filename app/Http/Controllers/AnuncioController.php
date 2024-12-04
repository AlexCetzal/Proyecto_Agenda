<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AnuncioController extends Controller
{
     // Mostrar el anuncio en la vista
     public function index()
     {
         $anuncio = Anuncio::latest()->first(); // Recuperar el último anuncio
         return view('home', compact('anuncio')); // Pasar la variable a la vista
     }
     

     // Actualizar el anuncio
   
public function store(Request $request)
    {
    // Validación para asegurarse de que el archivo sea una imagen
    $request->validate([
        'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Verificar si se ha subido una imagen
    if ($request->hasFile('imagen')) {
        $image = $request->file('imagen');
        // Guardar la imagen en 'storage/app/public/anuncios'
        $path = $image->store('public/anuncios');

        // Guardar el nombre de la imagen en la base de datos si es necesario
        $anuncio = new Anuncio();
        $anuncio->imagen = basename($path); // Solo guardamos el nombre del archivo
        $anuncio->save();

        return response()->json(['success' => true, 'imagePath' => 'anuncios/' . basename($path)]);
    }

    return response()->json(['success' => false]);
    }
}