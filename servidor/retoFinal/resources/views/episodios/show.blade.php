@extends('layouts.panelAdministracion')

@section('title', 'Ver Episodio')

@section('content')
    <div class="row justify-content-center">
        <div class="col-8  my-5 border border-dark shadow-lg p-4 rounded bg-secondary">
            <div>
                <h1 class="mb-4">Detalle del episodio</h1>
            </div>

            <div class="card">
                <div class="card-header">
                   <h3> Información del episodio</h3>
                </div>
                <div class="card-body">
                    <dl class="row">

                        <dt class="col-sm-4">Nombre:</dt>
                        <dd class="col-sm-8">{{ $episodio->titulo }}</dd>
                        <dt class="col-sm-4">Numero:</dt>
                        <dd class="col-sm-8">{{ $episodio->numero }}</dd>
                        <dt class="col-sm-4">Sinopsis:</dt>
                        <dd class="col-sm-8">{{ $episodio->sinopsis }}</dd>
                        <dt class="col-sm-4">Fecha estreno:</dt>
                        <dd class="col-sm-8">{{ $episodio->fecha_estreno }}</dd>
                        <dt class="col-sm-4">Duracion:</dt>
                        <dd class="col-sm-8">{{ $episodio->duracion }}</dd>
                        <dt class="col-sm-4">Episodio:</dt>
                        <dd class="col-sm-8">
                            <video class="rounded" controls style="max-width: 300px;">
                                <source src="{{ asset($episodio->archivo) }}">
                            </video>
                        </dd>

                    </dl>
                </div>
                <div class="px-3 mt-4 justify-content-center">
                    <a href="{{ route('episodios.edit', [$serie, $temporada, $episodio]) }}" class="btn bg-purple">Editar</a>
                    <a href="{{ route('temporadas.show', [$serie, $temporada]) }}" class="btn btn-warning me-2">Volver</a>
                </div>
            </div>
        </div>

    </div>
@endsection
