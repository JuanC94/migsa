<?php

namespace App\Http\Controllers;

use App\Indice;
use App\Indicador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class IndiceController extends Controller
{
    protected $indice;

    protected $indicador;

    public function __construct(Indice $indices, Indicador $indicadores)
    {
        parent::__construct();
        $this->indice = $indices;
        $this->indicador = $indicadores;
    }

    public function index()
    {
        $indices = $this->indice;
        $indices = $indices::orderBy('indicador_id', 'DESC')->orderBy('estadio')->get();
        $data = ['title' => 'Indices', 'indices' => $indices];
        return \view('indices.index', $data);
    }

    public function create()
    {
        $indice = $this->indice;
        $indicadores = $this->indicador;
        $indicadores = $indicadores::all();
        $data = ['title' => 'Crear Indice', 'indice' => $indice, 'indicadores' => $indicadores,'action' => 'create'];
        return \view('indices.form', $data);
    }

    public function store(Request $request)
    {
        $indices = $this->indice;
        $indices = $indices::where('indicador_id', $request->input('indicador_id'))
            ->where('estadio', $request->input('estadio'))
            ->first();
        if($indices){
            return Redirect::back()
                ->with('error', true)
                ->with('message', 'Ya existe un estadio registrado con el mismo número para el indicador seleccionado, intenta nuevamente.')
                ->withInput();
        }
        $indice = new $this->indice;
        $indice->nombre = $request->input('nombre');
        $indice->indicador_id = $request->input('indicador_id');
        $indice->estadio = $request->input('estadio');
        $indice->save();
        return Redirect::route('indexIndice')->with('success', true)->with('message', 'Indice creado con exito.');
    }

    public function edit($id)
    {
        $indice = $this->indice;
        $indice = $indice::find($id);
        $indicadores = $this->indicador;
        $indicadores = $indicadores::all();
        $data = ['title' => 'Editar Indice', 'indice' => $indice, 'indicadores' => $indicadores,'action' => 'edit'];
        return \view('indices.form', $data);
    }

    public function update($id, Request $request)
    {
        $indice = $this->indice;
        $indice = $indice::find($id);
        $indice->nombre = $request->input('nombre');
        $indice->indicador_id = $request->input('indicador_id');
        $indice->estadio = $request->input('estadio');
        $indice->save();
        return Redirect::route('indexIndice')->with('success', true)->with('message', 'Indice actualizado con exito.');
    }
}
