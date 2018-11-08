@extends ('layouts.admin')
@section ('contenido')


<form action="/rventas" method="get">

<div class="row">

    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <label for="fecha_inicial">fecha inicial</label>
                <input type="date" name="fecha_inicial" required value="{{old('fecha_inicial')}}" class="form-control" placeholder="...">
    </div>  

    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <label for="fecha_final">fecha final</label>
                <input type="date" name="fecha_final" required value="{{old('fecha_final')}}" class="form-control" placeholder="...">
    </div>
<br>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <button type="submit" class="btn btn-info">Reporte Por Fecha</button>
    </div>

</div>

</form>
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Listado de Asignaciones <a href="entrega/create"><button class="btn btn-success">Nuevo</button></a> <a href="{{url('reporteventas')}}" target="_blank"><button class="btn btn-info">Reporte</button></a></h3>
        @include('almacen.entrega.search')
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Fecha</th>
                    <th>Empleado</th>
                    <th>Articulo</th>
                    <th>cantidad</th>
                    <th>Opciones</th>
                </thead>
               @foreach ($entrega as $ven)
                <tr>
                    <td>{{ $ven->fecha}}</td>
                    <td>{{ $ven->nombre}}</td>
                    <td>{{ $ven->articulo}}</td>
                    <td>{{ $ven->cantidad}}</td>
                    <td>
                        <a href="{{URL::action('EntregaController@show',$ven->identrega)}}"><button class="btn btn-primary">Detalles</button></a>
                        <a target="_blank" href="{{URL::action('EntregaController@reportec',$ven->identrega)}}"><button class="btn btn-info">Reporte</button></a>
                         <a href="" data-target="#modal-delete-{{$ven->identrega}}" data-toggle="modal"><button class="btn btn-danger">Anular</button></a>
                    </td>
                </tr>
                @include('almacen.entrega.modal')
                @endforeach
            </table>
        </div>
        {{$entrega->render()}}
    </div>
</div>
@push ('scripts')
<script>
$('#liEntrega').addClass("treeview active");
$('#liEntregas').addClass("active");
</script>
@endpush

@endsection