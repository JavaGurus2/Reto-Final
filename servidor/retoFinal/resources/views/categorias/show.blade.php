@extends('layouts.panelAdministracion')

@section('title', 'Ver Categoria')

@section('content')
    <div class="row">
        <div class="col-12">
            <div>
                <h1 class="mb-4">Detalle de la Categoria</h1>
            </div>

            <div class="card">
                <div class="card-header">
                    Información de la categoria
                </div>
                <div class="card-body">
                    <dl class="row">

                        <dt class="col-sm-4">Nombre:</dt>
                        <dd class="col-sm-8">{{ $categoria->nombre }}</dd>
                        <dt class="col-sm-4">Imagen:</dt>
                        <dd class="col-sm-8">{{ $categoria->imagen }}</dd>
                    </dl>
                </div>
                <div class="px-3 mt-4">
                    <a href="{{ route('categorias.index') }}" class="btn btn-secondary me-2">Volver</a>
                    <a href="{{ route('categorias.edit', $categoria) }}" class="btn btn-primary">Editar</a>
                </div>
            </div>
        </div>

    </div>
@endsection
