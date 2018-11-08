@extends ('layouts.admin')
@section ('contenido')


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

		<div class="box box-info">
               <div class="box-header with-border">
                  <h3 class="box-title" style="font-size:17px;"> Todos los Reportes</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="chart">

                  	<a href="{{ url('reporte-empleados') }}">reportes Empleados </a>
<br>
<br>
                    <a href="{{ url('reporte-articulo') }}"> reprotes para articulo</a>

<br>
<br>
                    <a href="{{ url('reporte-ventas') }}"> reprotes para ventas</a>
<br>
<br>
                    <a href="{{ url('reporte-ingresos')}}">reportes ingresos</a>
                    <br>
<br>
                    <a href="{{ url('reporte-clien')}}">reportes clientes</a>


                  </div>
                </div><!-- /.box-body -->
              </div>

</div>


@push ('scripts')
<script >
$('#liReportes').addClass("treeview active");
$('#liRepor').addClass("active");
</script>
@endpush
@endsection