@extends ('layouts.admin')
@section ('contenido')



<h2>Reportes de los Empleados </h2>
<div class="row">
  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <div class=""> <br></div>
    <a href="{{url('reporteempple')}}" target="_blank"><button class="btn btn-info">Reporte General De Empleados</button></a>
  </div>

 
</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <form action="/entraempleado" method="get">

<div class="row">

  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    <label for="fecha_inicial">Fecha Ingreso</label>
                <input type="date" name="fecha_inicial" required value="{{old('fecha_inicial')}}" class="form-control" placeholder="..." target="_blank">
  </div>  
<br>
  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    <button type="submit" class="btn btn-info" target="_blank">Reporte Por Fecha</button>
  </div>

</div>

</form>
        
</div>

@push ('scripts')
<script>
$('#liReportes').addClass("treeview active");
$('#liRepor').addClass("active");
</script>
@endpush
@endsection