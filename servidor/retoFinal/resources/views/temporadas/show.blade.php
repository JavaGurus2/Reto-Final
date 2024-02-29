@extends('layouts.panelAdministracion')

@section('title', 'Ver Temporadas')

@section('content')
    <div class="row">
        <div class="col-12">
            <div>
                <h1 class="mb-4">Detalle de la temporada</h1>
            </div>

            <div class="card">
                <div class="card-header">
                    Información de la temporada
                </div>
                <div class="card-body">
                    <dl class="row">

                        <dt class="col-sm-4">Nombre:</dt>
                        <dd class="col-sm-8">{{ $temporada->nombre }}</dd>
                        <dt class="col-sm-4">Numero:</dt>
                        <dd class="col-sm-8">{{ $temporada->numero }}</dd>
                        <dt class="col-sm-4">Fecha de estreno:</dt>
                        <dd class="col-sm-8">{{ $temporada->fecha_estreno }}</dd>

                    </dl>
                </div>
                <div class="px-3 mt-4">
                    <a href="{{ route('temporadas.index') }}" class="btn btn-secondary me-2">Volver</a>
                    <a href="{{ route('temporadas.edit', $temporada) }}" class="btn btn-primary">Editar</a>
                </div>
            </div>
        </div>

    </div>
@endsection
