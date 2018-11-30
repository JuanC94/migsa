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
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Empresa</th>
                            <th>Reporte</th>                            
                            <th>Ver</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($empresas->count())
                            @foreach($empresas as $empresa)
                                <tr>
                                    <td>{{ $empresa->name }}</td>
                                    <td>{{ $empresa->numero_reporte }}</td>
                                    <td>
                                        <a href="{{ route('reporteempresa', ['user' => $empresa->id, 'numero' =>1 ]) }}" class="btn btn-warning btn-xs">Ver reporte</a>
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