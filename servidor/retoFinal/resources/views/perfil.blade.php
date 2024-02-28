@extends('layouts.panelAdministracion')

@section('title', 'Perfil')

@section('content')

    <div class=" row d-flex justify-content-center my-4 ">
        <!-- Primer div -->
        <div class=" col-10 rounded-4 p-3 bg-primary position-relative"
            style="height: 230px; background: url('{{ asset('/images/banner.png') }}'); background-size: cover;
            background-position: center center;
            background-attachment: local;">
        </div>
        <!-- Segundo div -->
        <div class=" col-12 position-absolute rounded-4 p-3 bg-light bg-degraded card card-body mx-3 mx-md-4 mt-n6"
            style="70%;z-index: 2;top:180px;width:60%;">
            <div class="card">
                <div class=" card-header dark:bg-dark">
                    Informacion Perfil
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <img src="{{ asset('storage/images/' . auth()->user()->imagen) }}" alt="foto-perfil"
                        class="rounded-circle m-2" width="100" height="100">
                </div>

                <div class="card-body">
                    <form action="{{ route('perfil.update', auth()->user()) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Nombre -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ auth()->user()->name }}">
                        </div>

                        <!-- Correo Electrónico -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ auth()->user()->email }}" disabled>
                        </div>

                        <!-- Imagen -->
                        <div class="mb-3">
                            <label for="imagen" class="form-label">Imagen</label>
                            <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
                        </div>

                        <!-- Botón de Enviar -->
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>

                </div>
            </div>

        </div>

    </div>

@endsection

@section('footer', '©️ Cervezas Killer')
