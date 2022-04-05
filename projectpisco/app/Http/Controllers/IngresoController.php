<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Medida;
use App\Models\Ingreso;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class IngresoController extends Controller
{
    public function index()
    {
        return view('almacen.movimiento.ingreso.index');
    }
    public function create()
    {
        $categorias = Categoria::all();
        $now = Carbon::now();
        // $ingresos = Ingreso::all();
        // $nubRow =count($ingresos)+1;
        // $codigo = $now->format('Ymd').'-'.$nubRow.'-MI';
        return view('almacen.movimiento.ingreso.create', compact('categorias','now'));
    }
    public function getProducto(Request $request)
    {
        if($request->ajax()){
            $productos = DB::table('medidas as me')
                ->join('productos as pro','pro.medida_id','=','me.id')
                ->select('pro.id','pro.name','me.abreviatura as medida')->where('categoria_id',$request->categoria_id)
                ->get();
            foreach($productos as $producto){
                $productoArray[$producto->id] = [$producto->name, $producto->medida];
            }
            return response()->json($productoArray);
        }
    }
    public function getMedida(Request $request)
    {
        if($request->ajax()){
            $medidas = Medida::where('abreviatura',$request->medida_id)->get();
            foreach($medidas as $medida){
                $medidaArray[$medida->id] = [$medida->abreviatura];
            }
            return response()->json($medidaArray);
        }
    }
    // public function create()
    // {
    //     $producto = Ingreso::all();
    //     $now = Carbon::now();
    //     $nubRow =count($producto)+1;
    //     $codigo = 'PROD'.'-'.$nubRow.'-'.$now->format('Ymd');

    //     $marcas = Marca::all();
    //     $categorias = Categoria::all();
    //     $medidas = Medida::all();
    //     $presentacion = Presentacion::all();
    //     return view('almacen.configuracion.productos.create', compact('codigo','presentacion','producto','marcas','categorias','medidas'));
    // }
}
