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
                    <a href="{{ route('createIndicador') }}" class="btn btn-primary"><li class="fa fa-plus"></li> Crear Indicador</a>
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Página</th>
                            <th>Indicador</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($indicadores->count())
                            @foreach($indicadores as $indicador)
                                <tr>
                                    <td>{{ $indicador->pagina->nombre }}</td>
                                    <td>{{ $indicador->nombre }}</td>
                                    <td>
                                        <a href="{{ route('editIndicador', ['id' => $indicador->id]) }}" class="btn btn-warning btn-xs">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3" align="center">No se encontraron registros</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection