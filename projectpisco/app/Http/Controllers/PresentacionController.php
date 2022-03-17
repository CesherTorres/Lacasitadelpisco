<?php

namespace App\Http\Controllers;
use App\Models\Presentacion;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PresentacionController extends Controller
{
    public function index()
    {
        $presentaciones = Presentacion::all();
        return view('almacen.configuracion.presentacion.index', compact('presentaciones'));
    }

    public function store(Request $request)
    {
        $presentacion = new Presentacion();
        $presentacion->name = $request->input('name');
        $presentacion->slug = Str::slug($request->input('name'));
        $presentacion->descripcion = $request->input('descripcion');
        $presentacion->save();

        return redirect()->route('presentaciones.index')->with('addcategoria', 'ok');
    }
    public function update(Request $request, $id)
    {
        $presentacion = Presentacion::find($id);
        $presentacion->fill($request->all());
        $presentacion->save();
        
        return redirect()->route('presentaciones.index')->with('update', 'ok');
    }
    public function destroy($id)
    {
        $presentacion = Presentacion::find($id);
        $presentacion->delete();
        return redirect()->route('presentaciones.index')->with('delete', 'ok');
    }
}
