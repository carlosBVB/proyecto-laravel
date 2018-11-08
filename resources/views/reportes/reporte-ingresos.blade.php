@extends ('layouts.admin')
@section ('contenido')


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

    <div class="box box-info">
          <div class="box-header with-border">
                  <h3 class="box-title" style="font-size:17px;">Reportes de Ingresos</h3>
              <div class="box-tools pull-right">

                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
          </div>
          <div class="box-body">
                <div class="chart">

                  
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



{!!Form::open(array('url'=>'compras/ingresos','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}
                  
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