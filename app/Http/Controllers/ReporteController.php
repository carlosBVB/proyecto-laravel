<?php


namespace sisVentas\Http\Controllers;

use DB;
use Fpdf;
use Response;
use Carbon\Carbon;
use sisVentas\Articulo;
use sisVentas\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\ArticuloFormRequest;

class ReporteController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index(Request $request) {
        if ($request) {

            $query=trim($request->get('searchText'));
            $articulos=DB::table('articulo as a')
            ->join('categoria as c','a.idcategoria','=','c.idcategoria')

            ->select('a.idarticulo','a.nombre','a.codigo','a.stock','c.nombre as categoria','a.descripcion','a.imagen','a.estado')
            ->where('a.nombre','LIKE','%'.$query.'%')
            ->orwhere('a.codigo','LIKE','%'.$query.'%')
            ->orderBy('a.idarticulo','desc')
            ->paginate(7);
            return view('reportes.index',["articulos"=>$articulos,"searchText"=>$query]);
        }


    }

    public function store (ArticuloFormRequest $request)
    {
        $articulo=new Articulo;
        $articulo->idcategoria=$request->get('idcategoria');
        $articulo->codigo=$request->get('codigo');
        $articulo->nombre=$request->get('nombre');
        $articulo->stock=$request->get('stock');
        $articulo->descripcion=$request->get('descripcion');
        $articulo->estado='Activo';

        if (Input::hasFile('imagen')){
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/articulos/',$file->getClientOriginalName());
            $articulo->imagen=$file->getClientOriginalName();
        }
        $articulo->save();
        return Redirect::to('almacen/articulo');

    }
    public function show($id)
    {
        return view("almacen.articulo.show",["articulo"=>Articulo::findOrFail($id)]);
    }   

    public function reporteempleados() {
        return view("reportes.reporteempleados");
    }
  
    public function reportearticulo() {

        $categorias=DB::table('categoria')->where('condicion','=','1')->get();

        return view("reportes.reporte-articulo");
    }

    public function reporteventas() {
        return view("reportes.reporte-ventas");
    }

    public function reporteingre() {
        return view("reportes.reporte-ingresos");
    }

    public function reporteclien() {
        return view("reportes.reporte-clien");
    }
}