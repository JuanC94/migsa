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
                <form class="form-group" method="POST" action="@if($action == 'create'){{ route('storePais') }}@else{{ route('updatePais', ['id' => $pais->id]) }}@endif">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="{{ $pais->nombre }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection