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
                <form class="form-group" method="POST" action="@if($action == 'create'){{ route('storeSector') }}@else{{ route('updateSector', ['id' => $sectores->id]) }}@endif">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="{{ $sectores->nombre }}" required>
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select name="estado" class="form-control">
                            <option value="1" @if($sectores->estado) selected @endif>Activo</option>
                            <option value="0" @if(!$sectores->estado)  @endif>Inactivo</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection