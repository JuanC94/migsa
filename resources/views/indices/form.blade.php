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
                <form class="form-group" method="POST" action="@if($action == 'create'){{ route('storeIndice') }}@else{{ route('updateIndice', ['id' => $indice->id]) }}@endif">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="{{ $indice->nombre }}" required>
                    </div>
                    <div class="form-group">
                        <label for="indicador_id">Indicador</label>
                        <select name="indicador_id" class="form-control">
                            @foreach($indicadores as $indicador)
                                <option value="{{ $indicador->id }}" @if($indicador->id == $indicador->indicador_id) selected @endif>{{ $indicador->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="estadio">Estadio</label>
                        <select name="estadio" class="form-control">
                            <option value="1" @if($indice->estadio) selected @endif>1</option>
                            <option value="2" @if($indice->estadio) selected @endif>2</option>
                            <option value="3" @if($indice->estadio) selected @endif>3</option>
                            <option value="4" @if($indice->estadio) selected @endif>4</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection