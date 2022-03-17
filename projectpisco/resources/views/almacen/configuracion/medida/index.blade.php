@extends('template.index')

@section('title', 'Medida')
@section('content')
    <!-- principal -->
        <!-- Encabezado -->
            <div class="row pt-5">
                <div class="col-lg-9">
                    <h1 class="text-azul h2 text-uppercase fw-bold mb-0"> Medida</h1>
                    <p class="text-muted">Configura los principales atributos del producto</p>
                </div>
                <div class="col-lg-3 d-flex">
                    {{-- <button class="btn btn-secondary w-100 align-self-center text-white" id="downloadPdf">
                        <i class="bi bi-download me-2"></i>
                        Descargar Reporte
                    </button> --}}
                </div>
            </div>
        <!-- fin encabezado -->

        {{-- breacrumb --}}
            <div class="pt-2 pt-md-0" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page">Almacen</li>
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="/configuraciones">Configuraciones</a></li>
                    <li class="breadcrumb-item" aria-current="page">Medida</li>
                </ol>
            </div>
        {{-- fin breacrumb --}}
    <div class="row">
        <div class="col-12 col-lg-4">
            <div class="card border-4 borde-top-secondary shadow-sm p-2 mb-3">
                <form class="form-group" method="POST" action="/medidas">      
                @csrf
                    <div class="py-1">
                        <label for="name_id" class="form-label">Unidad de Medida<span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name_id" class="form-control fw-light form-control-sm" value="{{old('name')}}"  maxLength="100">
                        @error('name')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="py-1">
                        <label for="name_id" class="form-label">Abreviatura<span class="text-danger">*</span></label>
                        <div class="form-floating">
                            <input type="text" name="abreviatura" id="floatingTextarea2" class="form-control fw-light form-control-sm" value="{{old('abreviatura')}}"  maxLength="100">
                            <label for="floatingTextarea2">Escribe un comentario</label>
                            @error('descripcion')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="text-center pt-4">
                        <button type="submit" class="btn btn-tercery px-5 text-white">Registrar Medida</button>   
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12 col-lg-8">
            <div class="card border-4 borde-top-secondary shadow-sm py-2 mb-5">
                <div class="card-body">
                    <h6 class="text-uppercase fw-bold text-center">Lista de Medida</h6>
                    <table id="" class="display table table-hover table-sm py-2" cellspacing="0" style="width:100%">
                        <thead class="bg-light">
                            <tr>
                                <th class="h6">N°</th>
                                <th class="h6">Medida</th>
                                <th class="h6">Abreviatura</th>
                                <th class="h6 text-center">Acciones</th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach($medidas as $medida)
                                    <tr>
                                        <td class="fw-light align-middle">{{$medida->id}}</td>
                                        <td class="fw-light align-middle">{{$medida->name}}</td>
                                        <td class="fw-light align-middle">{{$medida->abreviatura}}</td>
                                        <td class="align-middle">                                        
                                            <div class="text-center">
                                                <form method="POST" action="{{ route('medidas.destroy',$medida->slug) }}" class="form-delete">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-tercery text-white btn-sm " data-bs-toggle="modal" data-bs-target="#editmedidas{{$medida->slug}}"><i class="bi bi-pencil-square"></i></button>
                                                    <button type="submit" class="btn btn-tercery text-white btn-sm"><i class="bi bi-trash-fill"></i></button>        
                                                </form>
                                            </div>    
                                        </td>
                                    </tr>
                                    @include('almacen.configuracion.medida.edit')
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--Fin principal -->
@endsection

@section('js')
    <!--sweet alert agregar-->
    @if(session('addcategoria') == 'ok')
    <script>
        Swal.fire({
        icon: 'success',
        confirmButtonColor: '#07A683',
        title: '¡Éxito!',
        text: 'Medida registrada correctamente',
        })
    </script>
    @endif

    <!--sweet alert actualizar-->
    @if(session('update') == 'ok')
    <script>
        Swal.fire({
        icon: 'success',
        confirmButtonColor: '#07A683',
        title: '¡Actualizado!',
        text: 'Registro actualizado correctamente',
        })
    </script>
    @endif

    <!--sweet alert eliminar-->
    @if(session('delete') == 'ok')
    <script>
    Swal.fire({
        icon: 'success',
        confirmButtonColor: '#07A683',
        title: '¡Eliminado!',
        text: 'Registro eliminado correctamente',
        })
    </script>
    @endif
    <script>
    $('.form-delete').submit(function(e){
        e.preventDefault();

        Swal.fire({
        title: '¿Estas seguro?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#07A683',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Sí, eliminar!',
        cancelButtonText: 'Cancelar'
        }).then((result) => {
        if (result.isConfirmed) {
            
        this.submit();
        }
        })

    });
    </script>
    <!--.sweet alert eliminar-->

    <script>
    $(document).ready(function(){
    @if($message = Session::get('errors'))
        $("#createcategorias").modal('show');
    @endif
    });
    </script>
@endsection
