@extends ('layouts.admin')
@section ('contenido')

<form action="/ringresos" method="get">

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

		<h3>Listado de Ingresos <a href="ingreso/create">
			<button class="btn btn-success">Nuevo</button></a> <a href="{{url('reporteingresos')}}" target="_blank">
				<button class="btn btn-info">Reporte</button></a>
		</h3>
	
		@include('compras.ingreso.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Fecha</th>
					<th>Proveedor</th>
					<th>Comprobante</th>
					<th>Impuesto</th>
					<th>Total</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
               @foreach ($ingresos as $ing)
				<tr>
					<td>{{ $ing->fecha_hora}}</td>
					<td>{{ $ing->nombre}}</td>
					<td>{{ $ing->tipo_comprobante.': '.$ing->serie_comprobante.'-'.$ing->num_comprobante}}</td>
					<td>{{ $ing->impuesto}}</td>
					<td>{{ $ing->total}}</td>
					<td>{{ $ing->estado}}</td>
					<td>
						<a href="{{URL::action('IngresoController@show',$ing->idingreso)}}"><button class="btn btn-primary">Detalles</button></a>
						<a target="_blank" href="{{URL::action('IngresoController@reportec',$ing->idingreso)}}"><button class="btn btn-info">Reporte</button></a>
                         <a href="" data-target="#modal-delete-{{$ing->idingreso}}" data-toggle="modal"><button class="btn btn-danger">Anular</button></a>
					</td>
				</tr>
				@include('compras.ingreso.modal')
				@endforeach
			</table>
		</div>
		{{$ingresos->render()}}
	</div>
</div>
@push ('scripts')
<script>
$('#liCompras').addClass("treeview active");
$('#liIngresos').addClass("active");
</script>
@endpush
@endsection