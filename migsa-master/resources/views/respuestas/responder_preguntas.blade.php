@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="blue">
                    <h4 class="title">{{ $title }}</h4>
                </div>
                <div class="card-content table-responsive">
                    <div class="form-group">
                        <label for="propiedad">Propiedad :</label>
                        <label for="propiedad">{{$propiedad}}</label>

                        <label for="dimesion">Dimensión :</label>
                        <label for="dimesion">{{$dimension}}</label>
                    </div>
                </div>
                <div class="card-content table-responsive">
                    @include('message.message')
                    <form class="form-group" method="POST" action="{{ route('storeRespuesta') }}">
                        @csrf
                        @foreach($pagina->indicadores as $indicador)
                            <label for="indice_{{ $indicador->id }}">{{ $indicador->nombre }}</label>
                            <div class="row form-group table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <td></td>
                                        @for($i=1; $i <= 10; $i++)
                                            <th>{{ $i }}</th>
                                        @endfor
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($indicador->indices as $indice)
                                    <tr>
                                        <td>{{ $indice->nombre }}</td>
                                        @for($i=1; $i <= 10; $i++)
                                            <td><input type="radio" name="indice_{{ $indicador->id }}" value="{{ $indice->id }}_{{ $i }}_{{ $indice->estadio}}"></td>
                                        @endfor
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection