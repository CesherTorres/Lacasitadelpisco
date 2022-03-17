<?php

namespace App\Http\Controllers;
use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MarcaController extends Controller
{
    public function index()
    {
        $marcas = Marca::all();
        return view('almacen.configuracion.marca.index', compact('marcas'));
    }

    public function store(Request $request)
    {
        $marca = new Marca();
        $marca->name = $request->input('name');
        $marca->slug = Str::slug($request->input('name'));
        $marca->descripcion = $request->input('descripcion');
        $marca->save();

        return redirect()->route('marcas.index')->with('addcategoria', 'ok');
    }
    public function update(Request $request, Marca $marca)
    {
        $marca->fill($request->all());
        $marca->save();
        
        return redirect()->route('marcas.index')->with('update', 'ok');
    }
    public function destroy(Marca $marca)
    {
        $marca->delete();
        return redirect()->route('marcas.index')->with('delete', 'ok');
    }
}
