@extends('layouts.panelAdministracion')

@section('title', 'Ver Episodio')

@section('content')
    <div class="row">
        <div class="col-12">
            <div>
                <h1 class="mb-4">Detalle del episodio</h1>
            </div>

            <div class="card">
                <div class="card-header">
                    Información del episodio
                </div>
                <div class="card-body">
                    <dl class="row">

                        <dt class="col-sm-4">Nombre:</dt>
                        <dd class="col-sm-8">{{ $episodio->nombre }}</dd>
                        <dt class="col-sm-4">Numero:</dt>
                        <dd class="col-sm-8">{{ $episodio->numero }}</dd>
                        <dt class="col-sm-4">Email:</dt>
                        <dd class="col-sm-8">{{ $episodio->sinopsis }}</dd>
                        <dt class="col-sm-4">Duracion:</dt>
                        <dd class="col-sm-8">{{ $episodio->duracion }}</dd>
                        <dt class="col-sm-4">Imagen:</dt>
                        <dd class="col-sm-8">{{ $episodio->archivo }}</dd>

                    </dl>
                </div>
                <div class="px-3 mt-4">
                    <a href="{{ route('episodios.index') }}" class="btn btn-secondary me-2">Volver</a>
                    <a href="{{ route('episodios.edit', $episodio) }}" class="btn btn-primary">Editar</a>
                </div>
            </div>
        </div>

    </div>
@endsection
