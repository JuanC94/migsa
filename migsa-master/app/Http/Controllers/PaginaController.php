<?php

namespace App\Http\Controllers;

use App\Pagina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PaginaController extends Controller
{
    protected $pagina;

    public function __construct(Pagina $paginas)
    {
        parent::__construct();
        $this->pagina = $paginas;
    }

    public function index()
    {
        $paginas = $this->pagina;
        $paginas = $paginas::all();
        $data = ['title' => 'Paginas', 'paginas' => $paginas];
        return \view('paginas.index', $data);
    }

    public function create()
    {
        $pagina = $this->pagina;
        $data = ['title' => 'Crear Página', 'pagina' => $pagina, 'action' => 'create'];
        return \view('paginas.form', $data);
    }

    public function store(Request $request)
    {
        
        $pagina = new $this->pagina;
        $pagina->nombre = $request->input('nombre');
        $pagina->dimension = $request->input('dimension');
        $pagina->propiedad = $request->input('propiedad');
        $pagina->estado = $request->input('estado');
        $pagina->save();
        return Redirect::route('indexPagina')->with('success', true)->with('message', 'Página creada con exito.');
    }

    public function edit($id)
    {
        $pagina = $this->pagina;
        $pagina = $pagina::find($id);
        $data = ['title' => 'Editar Página', 'pagina' => $pagina, 'action' => 'edit'];
        return \view('paginas.form', $data);
    }

    public function update($id, Request $request)
    {
        $pagina = $this->pagina;
        $pagina = $pagina::find($id);
        $pagina->nombre = $request->input('nombre');
        $pagina->estado = $request->input('estado');
        $pagina->save();
        return Redirect::route('indexPagina')->with('success', true)->with('message', 'Página actualizada con exito.');

    }
}
