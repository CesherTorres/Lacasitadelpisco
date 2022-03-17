<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('almacen.configuracion.categoria.index', compact('categorias'));
    }

    public function store(Request $request)
    {
        $categoria = new Categoria();
        $categoria->name = $request->input('name');
        $categoria->slug = Str::slug($request->input('name'));
        $categoria->descripcion = $request->input('descripcion');
        $categoria->save();

        return redirect()->route('categorias.index')->with('addcategoria', 'ok');
    }
    public function update(Request $request, Categoria $categoria)
    {
        $categoria->fill($request->all());
        $categoria->save();
        
        return redirect()->route('categorias.index')->with('update', 'ok');
    }
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index')->with('delete', 'ok');
    }
}
