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
                    <a href="{{ route('createSector') }}" class="btn btn-primary"><li class="fa fa-plus"></li> Crear Sector</a>
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Sector</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($sectores->count())
                            @foreach($sectores as $sector)
                                <tr>
                                    <td>{{ $sector->nombre }}</td>
                                    <td>
                                        <a href="{{ route('editSector', ['id' => $sector->id]) }}" class="btn btn-warning btn-xs">Editar</a>
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