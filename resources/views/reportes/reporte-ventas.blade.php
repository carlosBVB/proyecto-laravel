@extends ('layouts.admin')
@section ('contenido')


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

    <div class="box box-info">
          <div class="box-header with-border">
                  <h3 class="box-title" style="font-size:17px;">Reportes ventas</h3>
              <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
          </div>
          <div class="box-body">
                <div class="chart">
                  <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <a href="{{url('reporteventas')}}" target="_blank"><button class="btn btn-info">Reporte general de ventas</button></a></h3>
   
        </div>
      </div>

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
    <button type="submit" class="btn btn-info" target="_blank">Reporte Por Fecha</button>
  </div>

</div>

</form>
                  
                </div>
          </div><!-- /.box-body -->
    </div>

</div>

@push ('scripts')
<script>
$('#liReportes').addClass("treeview active");
$('#liRepor').addClass("active");
</script>
@endpush
@endsection