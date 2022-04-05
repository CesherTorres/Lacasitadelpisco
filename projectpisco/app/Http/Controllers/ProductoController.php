<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use App\Models\Marca;
use App\Models\Categoria;
use App\Models\Medida;
use App\Models\Presentacion;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $producto = Producto::all();
        return view('almacen.configuracion.productos.index', compact('producto'));
    }
    public function create()
    {
        $producto = Producto::all();
        $now = Carbon::now();
        $nubRow =count($producto)+1;
        $codigo = 'PROD'.'-'.$nubRow.'-'.$now->format('Ymd');

        $marcas = Marca::all();
        $categorias = Categoria::all();
        $medidas = Medida::all();
        $presentacion = Presentacion::all();
        return view('almacen.configuracion.productos.create', compact('codigo','presentacion','producto','marcas','categorias','medidas'));
    }
    public function store(Request $request)
    {
        // condicion para guardar el nombre de la imagen principal
        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $img_producto = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/productos/', $img_producto);
        }
        //
        // guardar un nuevo producto
        $producto = $request->all();
        $producto['foto'] = $img_producto;
        $producto['slug'] = Str::slug($request->input('name'));
        $producto['codigo'] = $request->input('codigo');
        Producto::create($producto);

        return redirect()->route('productos.index')->with('addproducto', 'ok');
    }
    public function edit(Producto $producto)
    {
        $marcas = Marca::all();
        $categorias = Categoria::all();
        $medidas = Medida::all();
        $presentacion = Presentacion::all();
        return view('almacen.configuracion.productos.edit', compact('presentacion','producto','marcas','categorias','medidas'));
    }
}
