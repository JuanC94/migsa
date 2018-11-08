@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Pagina</div>
                <form class="form-group" method="POST" action="{{ route('createPage') }}">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" class="form-control">
                </div>
                <div class="form-group">
                    <label for="dimension">Dimensión</label>
                    <input type="text" name="dimension" class="form-control">
                </div>
                <div class="form-group">
                    <label for="propiedad">Propiedad</label>
                    <input type="text" name="propiedad" class="form-control">
                </div>
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select name="estado"  class="form-control">
                        <option value="1" selected>Activo</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection