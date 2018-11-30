@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="blue">Dashboard</div>
                @include('message.message')
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <br>
                            <br>
                            <br>
                            <p align="center">Bienvenido a Migsa</p>
                            <br>
                            @if(Auth::user()->rol != 'Admin')
                                <p align="center">Navega por las páginas en el menú izquierdo y responde las preguntas, es muy importante para nosotros.</p>
                            @endif
                            <br>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
