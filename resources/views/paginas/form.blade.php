@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">{{ $title }}</h4>
            </div>

            <div class="card-content table-responsive">
                @include('message.message')
                <form class="form-group" method="POST" action="@if($action == 'create'){{ route('storePagina') }}@else{{ route('updatePagina', ['id' => $pagina->id]) }}@endif">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="{{ $pagina->nombre }}" required>
                    </div>
                    <div class="form-group">
                        <label for="dimension">Dimesión</label>
                        <input type="text" name="dimension" class="form-control" value="{{ $pagina->dimension }}" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Propiedad</label>
                        <input type="dimension" name="propiedad" class="form-control" value="{{ $pagina->propiedad }}" required>
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select name="estado" class="form-control">
                            <option value="1" @if($pagina->estado) selected @endif>Activo</option>
                            <option value="0" @if(!$pagina->estado)  @endif>Inactivo</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection