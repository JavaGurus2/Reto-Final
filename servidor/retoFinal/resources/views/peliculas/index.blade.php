@extends('layouts.panelAdministracion')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Peliculas') }}
                        <a href="{{ route('peliculas.create') }}">Crear pelicula</a>
                    </div>

                    <div class="card-body">

                        <table>
                            <tr>
                                <th>Id</th>
                                <th>Titulo</th>
                                <th>Fecha estreno</th>
                                <th>Acciones</th>
                            </tr>
                            @forelse ($peliculas as $pelicula)
                                <tr>
                                    <td>{{ $pelicula->id }}</td>
                                    <td>{{ $pelicula->titulo }}</td>
                                    <td>{{ $pelicula->fecha_estreno }}</td>
                                    <td>
                                        <a href="{{ route('peliculas.show', $pelicula) }}">Ver</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>No hay peliculas</td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
