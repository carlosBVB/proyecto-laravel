<?php


namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\Http\Requests;
use sisVentas\Asignacion;
use sisVentas\DetalleAsignaciones;
use sisVentas\Http\Requests\EntregaFormRequest;
use DB;
use Fpdf;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class EntregaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function index(Request $request)
    {
        if ($request)
        {
           $query=trim($request->get('searchText'));
           $entrega=DB::table('entregas as e')
            ->join('persona as p','e.idempleado','=','p.idpersona')
            ->join('detalle_entrega as de','e.identrega','=','de.identrega')
            ->select('e.identrega','e.fecha','p.nombre','e.estado')
            ->where('e.fecha','LIKE','%'.$query.'%')
            ->orwhere('p.nombre','LIKE','%'.$query.'%')
            ->orderBy('e.identrega','desc')
            ->groupBy('e.identrega','e.fecha','p.nombre','e.estado')
            ->paginate(7);
            return view('almacen.entrega.index',["entrega"=>$entrega,"searchText"=>$query]);

        }
    }
    public function create()
    {
        $personas=DB::table('persona')->where('tipo_persona','=','Empleado')->get();
        $articulos = DB::table('articulo as art')
        ->join('detalle_entrega as de','art.idarticulo','=','de.idarticulo')
        ->select('art.codigo','art.nombre','art.stock','art.idarticulo')
            ->where('art.estado','=','Activo')
            ->where('art.stock','>','0')
                        ->get();
        return view("almacen.entrega.create",["personas"=>$personas,"articulos"=>$articulos]);
    }

     public function store (EntregaFormRequest $request)
    {
        try{
            DB::beginTransaction();
            $entrega=new Asignacion;
            $entrega->idempleado=$request->get('idempleado');
            $entrega->codigo=$request->get('codigo');
            $entrega->estado='A';
            $entrega->save();
            $idarticulo = $request->get('idarticulo');
            $cantidad = $request->get('cantidad');
            $cont = 0;

            while($cont < count($idarticulo)){
                $detalle = new DetalleAsignaciones();
                $detalle->identrega= $entrega->identrega; 
                $detalle->idarticulo= $idarticulo[$cont];
                $detalle->cantidad= $cantidad[$cont];
                $detalle->save();
                $cont=$cont+1;            
            }

            DB::commit();

        }catch(\Exception $e)
        {
            DB::rollback();
        }

        return Redirect::to('almacen/entrega');
    }

    public function show($id)
    {
        $entrega=DB::table('entregas as e')
            ->join('persona as p','e.idempleado','=','p.idpersona')
            ->join('detalle_entrega as de','e.identrega','=','de.identrega')
            ->select('e.identrega','e.fecha','p.nombre','e.estado')
            ->where('e.identrega','=',$id)
            ->first();

        $detalles=DB::table('detalle_entrega as d')
             ->join('articulo as a','d.idarticulo','=','a.idarticulo')
             ->select('a.nombre as articulo','d.cantidad', 'a.cantidad')
             ->where('d.identrega','=',$id)
             ->get();
        return view("almacen.entrega.show",["entrega"=>$entrega,"detalles"=>$detalles]);
    }

    public function destroy($id)
    {
        $entrega=Venta::findOrFail($id);
        $entrega->Estado='C';
        $entrega->update();
        return Redirect::to('almacen/entrega');
    }
}
