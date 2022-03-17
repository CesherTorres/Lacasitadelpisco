<?php

namespace App\Http\Controllers;
use App\Models\Motivo;
use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MotivoController extends Controller
{
    public function index()
    {
        $tipos = Tipo::all();
        $motivos = Motivo::all();
        return view('almacen.configuracion.motivo.index', compact('motivos', 'tipos'));
    }

    public function store(Request $request)
    {
        $motivos = new Motivo();
        $motivos->name = $request->input('name');
        $motivos->tipo_id = $request->input('tipo');
        $motivos->slug = Str::slug($request->input('name'));
        $motivos->descripcion = $request->input('descripcion');
        $motivos->save();

        return redirect()->route('motivos.index')->with('addcategoria', 'ok');
    }
    public function update(Request $request, Motivo $motivo)
    {
        $motivo->fill($request->all());
        $motivo->save();
        
        return redirect()->route('motivos.index')->with('update', 'ok');
    }
    public function destroy(Motivo $motivo)
    {
        $motivo->delete();
        return redirect()->route('motivos.index')->with('delete', 'ok');
    }
}
