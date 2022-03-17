<?php

namespace App\Http\Controllers;
use App\Models\Medida;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MedidaController extends Controller
{
    public function index()
    {
        $medidas = Medida::all();
        return view('almacen.configuracion.medida.index', compact('medidas'));
    }

    public function store(Request $request)
    {
        $medidas = new Medida();
        $medidas->name = $request->input('name');
        $medidas->slug = Str::slug($request->input('name'));
        $medidas->abreviatura = $request->input('abreviatura');
        $medidas->save();

        return redirect()->route('medidas.index')->with('addcategoria', 'ok');
    }
    public function update(Request $request, Medida $medida)
    {
        $medida->fill($request->all());
        $medida->save();
        
        return redirect()->route('medidas.index')->with('update', 'ok');
    }
    public function destroy(Medida $medida)
    {
        $medida->delete();
        return redirect()->route('medidas.index')->with('delete', 'ok');
    }
}
