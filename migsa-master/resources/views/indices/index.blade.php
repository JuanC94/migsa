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
                    <a href="{{ route('createIndice') }}" class="btn btn-primary"><li class="fa fa-plus"></li> Crear Indice</a>
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Página</th>
                            <th>Indicador</th>
                            <th>Indice</th>
                            <th>Estadio</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($indices->count())
                            @foreach($indices as $indice)
                                <tr>
                                    <td>{{ $indice->indicador->pagina->nombre }}</td>
                                    <td>{{ $indice->indicador->nombre }}</td>
                                    <td>{{ $indice->nombre }}</td>
                                    <td>{{ $indice->estadio }}</td>
                                    <td>
                                        <a href="{{ route('editIndice', ['id' => $indice->id]) }}" class="btn btn-warning btn-xs">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" align="center">No se encontraron registros</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection