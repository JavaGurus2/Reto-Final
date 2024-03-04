@extends('layouts.panelAdministracion')

@section('title', 'Crear Categoria')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-8 border border-dark shadow-lg p-4 rounded bg-secondary my-5">
                <h1 class="mb-4">Crear Categoria</h1>
                <form action="{{ route('categorias.store') }}" method="POST"  enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                        @if ($errors->has('nombre'))
                            <div class="invalid-feedback">
                                {{ $errors->first('nombre') }}
                            </div>
                        @endif
                    </div>

                    <div class="d-grid gap-2 m-5">
                        <input type="submit" class="btn bg-purple" value="Crear">
                        <a href="{{ route('categorias.index') }}" class="btn btn-warning">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
