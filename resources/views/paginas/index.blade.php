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
                    <a href="{{ route('createPagina') }}" class="btn btn-primary"><li class="fa fa-plus"></li> Crear Página</a>
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Página</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($paginas->count())
                            @foreach($paginas as $pagina)
                                <tr>
                                    <td>{{ $pagina->nombre }}</td>
                                    <td>
                                        <a href="{{ route('editPagina', ['id' => $pagina->id]) }}" class="btn btn-warning btn-xs">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="2" align="center">No se encontraron registros</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection