@extends('layouts.panelAdministracion')

@section('title', 'Ver Serie')

@section('content')
    <div class="row">
        <div class="col-12">
            <div>
                <h1 class="mb-4">Detalle de la serie</h1>
            </div>

            <div class="card">
                <div class="card-header">
                    Información de la serie
                </div>
                <div class="card-body">
                    <dl class="row">

                        <dt class="col-sm-4">Nombre:</dt>
                        <dd class="col-sm-8">{{ $serie->nombre }}</dd>
                        <dt class="col-sm-4">Sinopsis:</dt>
                        <dd class="col-sm-8">{{ $serie->sinopsis }}</dd>
                        <dt class="col-sm-4">Imagen:</dt>
                        <dd class="col-sm-8">
                            @if (isset($serie->imagen))
                                <img src="{{ asset($serie->imagen) }}" alt="Imagen de la película"
                                    style="max-width: 300px;">
                            @endif
                        </dd>
                        <dt class="col-sm-4">Archivo:</dt>
                        <dd class="col-sm-8">
                            @if (isset($serie->archivo))
                                <video controls style="max-width: 300px;">
                                    <source src="{{ asset($serie->archivo) }}">
                                </video>
                            @endif
                        </dd>
                        <dt class="col-sm-4">Fecha de estreno:</dt>
                        <dd class="col-sm-8">{{ $serie->fecha_estreno }}</dd>
                        <dt class="col-sm-4">Clasificacion:</dt>
                        <dd class="col-sm-8">{{ $serie->clasificacion }}</dd>
                    </dl>
                </div>
                <div class="px-3 mt-4">
                    <a href="{{ route('series.index') }}" class="btn btn-secondary me-2">Volver</a>
                    <a href="{{ route('series.edit', $serie) }}" class="btn btn-primary">Editar</a>
                </div>
            </div>
        </div>

    </div>
@endsection
