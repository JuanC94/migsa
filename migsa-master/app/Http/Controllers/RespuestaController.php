<?php

namespace App\Http\Controllers;

use App\Indicador;
use App\Indice;
use App\Pagina;
use App\Respuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class RespuestaController extends Controller
{
    protected $respuesta;

    protected $pagina;

    protected $indicador;

    protected $indice;

    public function __construct(Respuesta $respuestas, Pagina $paginas, Indicador $indicadores, Indice $indices)
    {
        parent::__construct();
        $this->respuesta = $respuestas;
        $this->pagina = $paginas;
        $this->indicador = $indicadores;
        $this->indice = $indices;
    }

    public function store(Request $request)
    {
        $inputs = $request->input('*');

        $user = DB::table('users')->where('id', Auth::id())->first();
        foreach ($inputs as $key => $value){
            if($key != 0){
                $respuesta = new $this->respuesta;
                $valores = explode('_', $value);
                $respuesta->valor = $valores[1];
                $respuesta->indice_id = $valores[0];
                $respuesta->user_id = Auth::id();
                $respuesta->estado = 1;
                $respuesta->numero_reporte = $user->numero_reporte;  
                $respuesta->save();
            }
        }
        return Redirect::route('home')
            ->with('success', true)
            ->with('message', 'Respuestas guardadas con exito.');
    }

    public function responder_preguntas($id_pagina)
    {
        $pagina = $this->pagina;
        $pagina = $pagina::with('indicadores')->find($id_pagina);
        $data = ['title' => $pagina->nombre,'dimension' => $pagina->dimension,'propiedad' => $pagina->propiedad, 'pagina' => $pagina];
        return \view('respuestas.responder_preguntas', $data);
    }
}
