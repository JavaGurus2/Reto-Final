@extends('layouts.panelAdministracion')

@section('title', 'Crear Categoria')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-7">
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
                    <div class="mb-8">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" required>
                        @error('imagen')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2 mt-4">
                        <input type="submit" class="btn btn-primary" value="Crear">
                        <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
