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
                <form class="form-group" method="POST" action="@if($action == 'create'){{ route('storeIndicador') }}@else{{ route('updateIndicador', ['id' => $indicador->id]) }}@endif">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="{{ $indicador->nombre }}" required>
                    </div>
                    <div class="form-group">
                        <label for="pagina_id">Página</label>
                        <select name="pagina_id" class="form-control">
                            @foreach($paginas as $pagina)
                                <option value="{{ $pagina->id }}" @if($indicador->pagina_id == $pagina->id) selected @endif>{{ $pagina->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection