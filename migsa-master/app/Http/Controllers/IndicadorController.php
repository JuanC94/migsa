<?php

namespace App\Http\Controllers;

use App\Indicador;
use App\Pagina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class IndicadorController extends Controller
{
    protected $indicador;

    protected $pagina;

    public function __construct(Indicador $indicadores, Pagina $paginas)
    {
        parent::__construct();
        $this->indicador = $indicadores;
        $this->pagina = $paginas;
    }

    public function index()
    {
        $indicadores = $this->indicador;
        $indicadores = $indicadores::all();
        $data = ['title' => 'Indicadores', 'indicadores' => $indicadores];
        return \view('indicadores.index', $data);
    }

    public function create()
    {
        $indicador = $this->indicador;
        $paginas = $this->pagina;
        $paginas = $paginas::all();
        $data = ['title' => 'Crear Indicador', 'indicador' => $indicador, 'paginas' => $paginas, 'action' => 'create'];
        return \view('indicadores.form', $data);
    }

    public function store(Request $request)
    {
        $indicador = new $this->indicador;
        $indicador->nombre = $request->input('nombre');
        $indicador->pagina_id = $request->input('pagina_id');
        $indicador->save();
        return Redirect::route('indexIndicador')->with('success', true)->with('message', 'Indicador creado con exito.');
    }

    public function edit($id)
    {
        $indicador = $this->indicador;
        $indicador = $indicador::find($id);
        $paginas = $this->pagina;
        $paginas = $paginas::all();
        $data = ['title' => 'Editar Indicador', 'indicador' => $indicador, 'paginas' => $paginas, 'action' => 'edit'];
        return \view('indicadores.form', $data);
    }

    public function update($id, Request $request)
    {
        $pagina = $this->indicador;
        $pagina = $pagina::find($id);
        $pagina->nombre = $request->input('nombre');
        $pagina->estado = $request->input('pagina_id');
        $pagina->save();
        return Redirect::route('indexIndicador')->with('success', true)->with('message', 'Indicador actualizado con exito.');

    }
}
