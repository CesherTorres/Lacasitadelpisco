@extends('template.index')

@section('title', 'Configuración')
@section('css')
    <link rel="stylesheet" href="/css/card_config.css">
@endsection
@section('content')
    <!-- principal -->
        <!-- Encabezado -->
            <div class="row pt-5">
                <div class="col-lg-9">
                    <h1 class="text-azul h2 text-uppercase fw-bold mb-0"> Configuración de Productos</h1>
                    <p class="text-muted">Configura los principales atributos del producto y movimientos.</p>
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
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="">Almacén</a></li>
                    <li class="breadcrumb-item" aria-current="page">Configuración de almacén</li>
                </ol>
            </div>
        {{-- fin breacrumb --}}
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-3">
                    <div class="card border border-0">
                        <div class="face face1">
                            <div class="content">
                                <img src="/images/licores.png?raw=true" width="200px">
                                <h3>Producto</h3>
                            </div>
                        </div>
                        <div class="face face2 border-top rounded-bottom">
                            <div class="content text-start">
                                <ul>
                                    <li class="text-success"><a href="{{url('/categorias')}}" class="h5 text-decoration-none">Categoria</a></li>
                                    <li class="text-success"><a href="" class="h5 text-decoration-none">Marca</a></li>
                                    <li class="text-success"><a href="" class="h5 text-decoration-none">Tipo</a></li>
                                    <li class="text-success"><a href="" class="h5 text-decoration-none">Medida</a></li>
                                    <li class="text-success"><a href="" class="h5 text-decoration-none">Presentacion</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="card border border-0">
                        <div class="face face1">
                            <div class="content">
                                <img src="/images/category.png?raw=true">
                                <h3>Movimiento</h3>
                            </div>
                        </div>
                        <div class="face face2 border-top rounded-bottom">
                            <div class="content text-start">
                                <ul>
                                    <li class="text-success"><a class="h5 text-decoration-none">Motivo</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!--Fin principal -->
@endsection

@section('js')
    
@endsection
