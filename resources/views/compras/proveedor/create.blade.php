@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Proveedor</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>
			{!!Form::open(array('url'=>'compras/proveedor','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
    <div class="row">
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" required value="{{old('nombre')}}" class="form-control" placeholder="Nombre..." onkeypress="mayus(this);">
            </div>
    	</div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" name="direccion" value="{{old('direccion')}}" class="form-control" placeholder="Dirección..." onkeypress="mayus(this);">
            </div>
        </div>
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
    			<label>Documento</label>
    			<select name="tipo_documento" class="form-control">
                       <option value="RTN">RTN</option>
                       <option value="Cuenta Bancaria">Cuenta Banco</option>
                </select>
    		</div>
    	</div>
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="num_documento">Número documento</label>
            	<input type="text" name="num_documento" value="{{old('num_documento')}}" class="form-control" placeholder="Número de Documento..." onkeypress="mayus(this);">
            </div>
    	</div>
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="telefono">Teléfono</label>
            	<input type="text" name="telefono" value="{{old('telefono')}}" class="form-control" placeholder="Teléfono..." onkeypress="mayus(this);">
            </div>
    	</div>
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="descripcion">Email</label>
            	<input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Email...">
            </div>
    	</div>
         <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="date" name="fecha" required value="{{old('fecha')}}" class="form-control" placeholder="Número comprobante...">
            </div>
        </div>

    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
    	</div>
    </div>   
			{!!Form::close()!!}		

@push ('scripts')
<script>
$('#liCompras').addClass("treeview active");
$('#liProveedores').addClass("active");

function mayus(e) {
    e.value = e.value.toUpperCase();
}

</script>
@endpush
@endsection