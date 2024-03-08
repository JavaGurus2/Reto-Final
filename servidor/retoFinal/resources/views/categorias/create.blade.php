@extends('layouts.panelAdministracion')

@section('title', 'Crear Categoria')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-8 border border-dark shadow-lg p-4 rounded cartaShow my-5">
                <h4 class="p-3 m-1  text-white">
                    <a href="{{ route('categorias.index') }}" class="text-indigo-300 "> <i
                            class="fa-solid fa-arrow-left  me-3 text-indigo-300 fondoRosa rounded text-white p-1"></i></a>
                    {{ __('Categorías') }}

                </h4>
                <h1 class="mb-4 border-bottom">Crear Categoría</h1>
                <form action="{{ route('categorias.store') }}" method="POST" enctype="multipart/form-data" class="col-6 ">
                    @csrf

                    <div class="mb-4">
                        <label for="nombre" class="form-label">
                            <h3>Nombre</h3>
                        </label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                        @if ($errors->has('nombre'))
                            <div class="invalid-feedback">
                                {{ $errors->first('nombre') }}
                            </div>
                        @endif
                    </div>

                    <div class=" gap-2 m-5">
                        <input type="submit" class="btn fondoRosa text-white" value="Crear">
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
