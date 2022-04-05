@extends('template.index')

@section('title', 'Producto')
@section('content')
    <!-- principal -->
        <!-- Encabezado -->
            <div class="row pt-5">
                <div class="col-lg-9">
                    <h1 class="text-azul h2 text-uppercase fw-bold mb-0"> Productos</h1>
                    <p class="text-muted">Configura los principales atributos del producto</p>
                </div>
                <div class="col-lg-3 d-flex">
                    <a href="/productos/create" class="btn btn-secondary w-100 align-self-center text-white">
                        <i class="bi bi-download me-2"></i>
                        Crea un Producto
                    </a>
                </div>
            </div>
        <!-- fin encabezado -->

        {{-- breacrumb --}}
            <div class="pt-2 pt-md-0" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page">Almacen</li>
                    <li class="breadcrumb-item" aria-current="page">Producto</li>
                </ol>
            </div>
        {{-- fin breacrumb --}}
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card border-4 borde-top-secondary shadow-sm py-2 mb-5">
                <div class="card-body">
                    <h6 class="text-uppercase fw-bold text-center">Lista de Productos</h6>
                    <table id="" class="display table table-hover table-sm py-2" cellspacing="0" style="width:100%">
                        <thead class="bg-light">
                            <tr>
                                <th class="h6">N°</th>
                                <th class="h6">Código</th>
                                <th class="h6">Producto</th>
                                <th class="h6">Marca</th>
                                <th class="h6">Categoría</th>
                                <th class="h6">Medida</th>
                                <th class="h6">Presentacion</th>
                                <th class="h6 text-center">Acciones</th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach($producto as $productos)                                    
                                    <tr>
                                        <td class="fw-light align-middle">{{$productos->id}}</td>
                                        <td class="fw-light align-middle">{{$productos->codigo}}</td>
                                        <td class="fw-light align-middle">{{$productos->name}}</td>
                                        <td class="fw-light align-middle">{{$productos->marca->name}}</td>
                                        <td class="fw-light align-middle">{{$productos->categoria->name}}</td>
                                        <td class="fw-light align-middle">{{$productos->medida->name}}</td>
                                        <td class="fw-light align-middle">{{$productos->presentacion->name}}</td>
                                        <td class="align-middle">                                        
                                            <div class="text-center">
                                                <form method="POST" action="" class="form-delete">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{url("/productos/$productos->slug/edit/")}}" class="btn btn-tercery text-white btn-sm "><i class="bi bi-pencil-square"></i></a>
                                                    <button type="submit" class="btn btn-tercery text-white btn-sm"><i class="bi bi-trash-fill"></i></button>        
                                                </form>
                                            </div>    
                                        </td>
                                    </tr>
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
    @if(session('addproducto') == 'ok')
    <script>
        Swal.fire({
        icon: 'success',
        confirmButtonColor: '#07A683',
        title: '¡Éxito!',
        text: 'Producto registrado correctamente',
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
