@extends('template.index')

@section('title', 'Actualizar Producto')

@section('content')
    <!-- principal -->
        <!-- Encabezado -->
        <div class="row pt-5">
            <div class="col-lg-9">
                <h1 class="text-azul h2 text-uppercase fw-bold mb-0"> Actualizar Producto</h1>
                <p class="text-muted">Actualiza el registro de tu producto</p>
            </div>
        </div>
        <!-- fin encabezado -->

        {{-- breacrumb --}}
        <div class="pt-2 pt-md-0" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page">Almacen</li>
                <li class="breadcrumb-item"><a class="text-decoration-none" href="/productos">Producto</a></li>
                <li class="breadcrumb-item" aria-current="page">Actualizacion</li>
            </ol>
        </div>
        <div class="row mx-auto">
            <div class="col-lg-12">
                {{-- fin breacrumb --}}
                <form class="form-group" method="POST" action="/productos{{$producto->slug}}" enctype="multipart/form-data" autocomplete="off">      
                    @csrf
                    @method('put')
                    <div class="card border-4 borde-top-primary shadow-sm py-2" >
                        <div class="card-body">
                            <span class="text-danger">* <small class="text-muted py-0 my-0 text-start"> - Campos obligatorios</small></span>
                            <div class="row">
                                <div class="col-12 col-lg-7 py-1">
                                    <div class="row">
                                        <div class="col-12 col-lg-4 py-1">
                                            <label for="codigo_id" class="form-label d-block">Código<span class="text-danger">*</span></label>
                                            <input type="text" name="codigo" disabled id="codigo" class="float-end form-control form-control-sm  fw-light" value="{{$producto->codigo}}" maxLength="100">  
                                            @error('codigo')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-lg-4 py-1">
                                            <label for="name_id" class="form-label d-block">Nombre de producto<span class="text-danger">*</span></label>
                                            <input type="text" name="name" id="name" class="float-end form-control form-control-sm  fw-light" value="{{$producto->name}}" maxLength="100">  
                                            @error('name')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-lg-4 py-1">
                                            <label for="marca_id" class="form-label d-block">Marca<span class="text-danger">*</span></label>
                                            <select class="form-select select2 form-select-sm" name="marca_id" id="marcas_id" >
                                                <option value="{{$producto->marca->id}}" disabled="disabled" selected="selected" hidden="hidden">{{$producto->marca->name}}</option>
                                                @foreach($marcas as $marca)
                                                    <option value="{{$marca->id}}">{{$marca->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('marca_id')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-lg-4 py-1">
                                            <label for="unidads_id" class="form-label d-block">Unidad de medida<span class="text-danger">*</span></label>
                                            <select class="form-select select2 form-select-sm" name="medida_id" id="unidads_id" >
                                                <option value="{{$producto->medida->id}}" disabled="disabled" selected="selected" hidden="hidden">{{$producto->medida->name}}</option>
                                                @foreach($medidas as $medida) 
                                                <option value="{{$medida->id}}">{{$medida->name.' - '.$medida->abreviatura}}</option>
                                                @endforeach
                                            </select>
                                            @error('medida_id')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-lg-4 py-1">
                                            <label for="categorias_id" class="form-label d-block">Categoría<span class="text-danger">*</span></label>
                                            <select class="form-select select2 form-select-sm" name="categoria_id" id="categorias_id" >
                                                <option value="{{$producto->categoria->id}}" disabled="disabled" selected="selected" hidden="hidden">{{$producto->categoria->name}}</option>
                                                @foreach($categorias as $categoria)
                                                    <option value="{{$categoria->id}}">{{$categoria->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-lg-4 py-1">
                                            <label for="presentacion_id" class="form-label d-block">Presentacion<span class="text-danger">*</span></label>
                                            <select class="form-select select2 form-select-sm" name="presentacion_id" id="presentacion_id" >
                                                <option value="{{$producto->presentacion->id}}" disabled="disabled" selected="selected" hidden="hidden">{{$producto->presentacion->name}}</option>
                                                @foreach($presentacion as $presentacions)
                                                    <option value="{{$presentacions->id}}">{{$presentacions->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('marca_id')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-lg-12 py-1">
                                                <label for="descripcion_id" class="form-label">Descripción<span class="text-danger">*</span></label>
                                                <textarea class="form-control" name="descripcion" id="descripcion_id" placeholder="Escribe una descripción" style="height: 100px">{{$producto->descripcion}}</textarea>
                                            @error('descripcion')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-5 py-1">
                                    <label for="" class="form-label">Imagen Principal<span class="text-danger">*</span></label>
                                    <div class="card text-center imagecard rounded bg-light mb-0" style="height: 290px;">  
                                        <label for="uploadImage1" class=" my-auto text-center">
                                            <img for="uploadImage1" id="uploadPreview1" alt="" class="py-auto rounded" style="width: 80%; height: 280px;" src="/images/productos/{{$producto->foto}}">   
                                        </label>
                                    </div>
                                    <input id="uploadImage1" class="form-control-file" type="file" name="imagen" onchange="previewImagePrincipal(1);" hidden/>
                                    @error('imagen')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>                                
                            </div>
                    </div>

                    <div class="pt-3 pb-5 text-end">
                        <button type="submit" class="btn btn-primary px-5 my-2 my-md-0 text-white">Registrar nombre de producto</button>
                        <a href="{{url('productos')}}" class="btn btn-outline-secondary">Cancelar</a>
                    </div>      
                </form>
            </div>
        </div>

{{-- Fin contenido --}}   
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    function previewImagePrincipal(nb) {        
        var reader = new FileReader();         
        reader.readAsDataURL(document.getElementById('uploadImage'+nb).files[0]);                
        reader.onload = function (e) {   
            document.getElementById('uploadPreview'+nb).src = e.target.result;                  
        };     
    }
</script>
<script>
  // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
      $('.select2').select2();
  });
</script>
@endsection
