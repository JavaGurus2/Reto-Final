@extends('layouts.panelAdministracion')

@section('title', 'Ver Episodio')

@section('content')
    <div class="row justify-content-center">
        <div class="col-8  my-5 border border-dark shadow-lg p-4 rounded cartaShow">
            <div>
                <h4>
                    <a href="{{ route('temporadas.show', [$serie, $temporada]) }}" class="text-indigo-300"> <i
                            class="fa-solid fa-arrow-left  me-3 text-indigo-300 bg-purple rounded text-white p-2 mb-5"></i></a>
                    {{ __('Detalles Temporada') }}

                </h4>

            </div>

            <div class="card">
                <div class="card-header">
                    <h3> Información del episodio</h3>
                </div>
                <div class="card-body">
                    <dl class="row border rounded p-2 m-2">

                        <dt class="col-sm-4">Nombre:</dt>
                        <dd class="col-sm-8">{{ $episodio->titulo }}</dd>
                        <hr>
                        <dt class="col-sm-4">Numero:</dt>
                        <dd class="col-sm-8">{{ $episodio->numero }}</dd>
                        <hr>
                        <dt class="col-sm-4">Sinopsis:</dt>
                        <dd class="col-sm-8">{{ $episodio->sinopsis }}</dd>
                        <hr>
                        <dt class="col-sm-4">Fecha estreno:</dt>
                        <dd class="col-sm-8">{{ $episodio->fecha_estreno }}</dd>
                        <hr>
                        <dt class="col-sm-4">Duracion:</dt>
                        <dd class="col-sm-8">{{ $episodio->duracion }}.min</dd>
                        <hr>
                        <dt class="col-sm-4">Episodio:</dt>
                        <dd class="col-sm-8">
                            <video class="rounded" controls style="max-width: 500px;">
                                <source src="{{ asset($episodio->archivo) }}">
                            </video>
                        </dd>

                    </dl>
                </div>
                <div class="px-3 my-4 justify-content-center">
                    <a href="{{ route('episodios.edit', [$serie, $temporada, $episodio]) }}"
                        class="btn bg-purple text-white">Editar</a>
                </div>
            </div>
        </div>

    </div>
@endsection
