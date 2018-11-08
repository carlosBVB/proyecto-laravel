@extends ('layouts.admin')
@section ('contenido')


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

    <div class="box box-info">
               <div class="box-header with-border">
                  <h3 class="box-title" style="font-size:17px;">Reportes</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="chart">

                    <a href= "">reportes articulossss 2018<
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