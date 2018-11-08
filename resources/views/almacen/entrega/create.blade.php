@extends ('layouts.admin')
@section ('contenido')
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <h3>Nueva Asignacion</h3>
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
      {!!Form::open(array('url'=>'almacen/entrega','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
    <div class="row">
      <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        <div class="form-group">
              <label for="cliente">Empleado</label>
              <select name="idcliente" id="idcliente" class="form-control selectpicker" data-live-search="true">
                    @foreach($personas as $persona)
                     <option value="{{$persona->idpersona}}">{{$persona->nombre}}</option>
                     @endforeach
                </select>
            </div>

      </div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <label>Artículo</label>
                        <select name="pidarticulo" class="form-control selectpicker" id="pidarticulo" data-live-search="true">
                            @foreach($articulos as $ar)
                            <option value="{{$ar->idarticulo}}">{{$ar->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
        </div>

        <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" name="pcantidad" id="pcantidad" class="form-control" 
                        placeholder="cantidad">
                </div>
        </div>
                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" disabled name="pstock" id="pstock" class="form-control" 
                        placeholder="Stock">
                    </div>
                </div>
      </div>
              
    </div>
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-body">
               
                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <div class="form-group">
                       <button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
                    </div>
                </div>

                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                        <thead style="background-color:#A9D0F5">
                            <th>Opciones</th>
                            <th>Fecha</th>
                            <th>Empleado</th>
                            <th>Artículo</th>
                            <th>Cantidad</th>
                            
                        </thead>
                        
                        <tbody>
                            
                        </tbody>
                    </table>
                 </div>
            </div>
        </div>
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
        <div class="form-group">
              <input name"_token" value="{{ csrf_token() }}" type="hidden"></input>
                <button class="btn btn-primary" type="submit">Guardar</button>
              <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
      </div>
    </div>   
      {!!Form::close()!!}   

@push ('scripts')
<script>
  $(document).ready(function(){
    $('#bt_add').click(function(){
      agregar();
    });
  });

  var cont=0;
  total=0;
  subtotal=[];
  $("#guardar").hide();
 
 
  function agregar()
  {
    datosArticulo=document.getElementById('pidarticulo').value.split('_');

    idarticulo=datosArticulo[0];
    articulo=$("#pidarticulo option:selected").text();
    cantidad=$("#pcantidad").val();

    descuento=$("#pdescuento").val();
    precio_venta=$("#pprecio_venta").val();
    stock=$("#pstock").val();

    if (idarticulo!="" && cantidad!="" && cantidad>0 && descuento!="" && precio_venta!="")
    {
        if (parseInt(stock)>=parseInt(cantidad))
        {
        subtotal[cont]=(cantidad*precio_venta-descuento);
        total=total+subtotal[cont];

        var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td>';
        cont++;
        limpiar();
        
        evaluar();
        $('#detalles').append(fila);   
        }
        else
        {
            alert ('La cantidad a vender supera el stock');
        }
        
    }
    else
    {
        alert("Error al ingresar el detalle de la venta, revise los datos del artículo");
    }
  }
  function limpiar(){
    $("#pcantidad").val("");
  
  }
 
  function evaluar()
  {
    if (total>0)
    {
      $("#guardar").show();
    }
    else
    {
      $("#guardar").hide(); 
    }
   }

   function eliminar(index){
    total=total-subtotal[index]; 
    totales();  
    $("#fila" + index).remove();
    evaluar();

  }
$('#liEntrega').addClass("treeview active");
$('#liEntregas').addClass("active");
  
</script>
@endpush
@endsection