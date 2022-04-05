@extends('template.index')

@section('title','Movimiento - Ingreso')

@section('content')
    <!-- principal -->
        <!-- Encabezado -->
        <div class="row pt-5">
            <div class="col-lg-9">
                <h1 class="text-azul h2 text-uppercase fw-bold mb-0"> Movimiento de Ingreso</h1>
                <p class="text-muted">Registra un nuevo movimiento de ingreso</p>
            </div>
        </div>
        <!-- fin encabezado -->

 
    {{-- Contenido --}} 
    <form class="form-group" method="POST" action="/ingresos" enctype="multipart/form-data" autocomplete="off">      
        @csrf
        <div class="card border-4 borde-left-primary shadow-sm py-2 mb-4">
            <div class="card-body">
                <span class="text-danger">* <small class="text-muted py-0 my-0 text-start"> - Campos obligatorios</small></span>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-2 py-1">
                        <div class="form-group my-2 my-md-0">
                            <label for="">Responsable</label>
                            <input type="text" disabled name="responsable" class="form-control form-control-sm" value="{{Auth::user()->name}}">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-2 py-1">
                        <div class="form-group my-2 my-md-0">
                            <label for="">Movimiento de Ingreso</label>
                            <input type="text" disabled name="movimiento" class="form-control form-control-sm" value="Inventario">
                        </div>
                    </div>
                    <div class="col-12 col-md-2 py-1">
                        <div class="form-group my-2 my-md-0">
                            <label for="">Categoria de Producto</label>
                            <select class="form-select form-select-sm select2" name="categoria" id="categoria_id" aria-label=".form-select-sm example">
                                <option hidden>Seleccione una categoria</option>
                            @foreach($categorias as $categoria)
                                <option value="{{$categoria->id}}">{{$categoria->name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-2 py-1">
                        <div class="form-group my-2 my-md-0">
                            <label for="">Fecha de Operacion</label>
                            <input type="date" disabled value="{{$now->format('Y-m-d')}}" class="form-control form-control-sm" >
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="align-self-center">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body text-center">
                                    <label class="fw-bold d-block">N° de movimiento</label>
                                    <span class="badge bg-dark fs-6 p-2"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>              
            </div>
        </div>

        <div class="card border-4 borde-top-primary shadow-sm py-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-4 col-lg-3 py-1">
                        <div class="form-group my-2 my-md-0">
                            <label for="">Producto</label>
                            <select class="form-select form-select-sm select2" id="producto_id" aria-label=".form-select-sm example">
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-1 py-1">
                        <div class="form-group my-2 my-md-0">
                            <label for="">Medida</label>
                            <input type="text" id="medida_id" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-2 py-1">
                        <div class="form-group my-2 my-md-0">
                            <label for="">Cantidad</label>
                            <input type="number" min="1" max="500" class="form-control form-control-sm" id="cantidad">
                        </div>
                    </div>
                    <div class="col-12 col-md-3 col-lg-2 py-1">
                        <div class="form-group my-2 my-md-0">
                            <label for="">Precio</label>
                            <input type="number" min="1" class="form-control form-control-sm" id="precios">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-2 py-1">
                        <div class="form-group my-2 my-md-0">
                            <label for="">Fecha de vencimiento</label>
                            <input type="date" class="form-control form-control-sm" id="fechavencimiento" value="">
                        </div>
                    </div>
                    <div class="col-12 col-md-2 col-lg-2 py-1 d-flex">
                        <button type="button" id="btnagregar" class="btn btn-secondary btn-sm w-100 align-self-end text-white mt-2 mt-md-0" id="">
                            Agregar
                        </button>
                    </div>
                </div>

                <div class="table-responsive mt-3">
                    <table class="table" id="detalles">
                        <thead>
                          <tr>
                            <th class="fw-bold" >N°</th>
                            <th class="fw-bold">Producto</th>
                            <th class="fw-bold">Medida</th>
                            <th class="fw-bold">Cantidad</th>
                            <th class="fw-bold">Precio</th>
                            <th class="fw-bold">Fec. Vencimiento</th>
                            <th class="fw-bold">Accion</th>
                          </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>

                <div class="row">
                   <div class="col-4"></div>
                    <div class="py-2 col-12 col-md-8 text-end">
                        <label for="">Cantidad total de productos</label>
                        <p class="fw-bold text-primary fs-3" id="tproductos">0</p><input type="hidden" id="total_product" name="total_product">
                        @error('total_product')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
               
            </div>
        </div>
        
        <div class="text-end py-3">
            <button type="submit" class="btn btn-primary px-5 my-2 my-md-0 text-white">Registrar movimiento de ingreso</button> 
            <a href="{{url('ingresos')}}" class="btn btn-outline-secondary">Cancelar</a>  
        </div>
    </form>
    {{-- Fin contenido --}}    
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    // In your Javascript (external .js resource or <script> tag)
      $(document).ready(function() {
        $('.select2').select2();
    });
</script>
<script>
    $(document).ready(function() {
        $('#categoria_id').on('change', function(){
            var categoria_id = $(this).val();
            if($.trim(categoria_id) !=''){
                $.get('/entrada/producto', {categoria_id: categoria_id}, function(productos){
                    $('#producto_id').empty();
                    $('#producto_id').append("<option value=''>Selecciona un Producto</option>");
                    $.each(productos, function(index, value){
                        $('#producto_id').append("<option value='"+index[0]+"_"+value[1]+"'>"+value[0]+"</option>");
                    })
                });
            }
        });
         $('#producto_id').on('change', function(){
            var medida = document.getElementById("producto_id").value.split('_');
            var medida_id = medida[1];
            if($.trim(medida_id) !=''){
                $.get('/entrada/medida', {medida_id: medida_id}, function(medidas){
                    $('#medida_id').empty();
                    $('#medida_id').append("<input type='text' class='form-control form-control-sm'>");
                    $.each(medidas, function(index, value){
                        $('#medida_id').val(""+value[0]+"");
                    })
                });
            }
        });
    });
</script>


@endsection
