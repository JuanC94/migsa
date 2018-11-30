<?php

namespace App\Http\Controllers;

use App\Pais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PaisController extends Controller
{
    protected $pais;

    public function __construct(Pais $pais)
    {
        parent::__construct();
        $this->pais = $pais;
    }
    public function index()
    {
        $pais = $this->pais;
        $pais = $pais::all();
        $data = ['title' => 'Pais', 'paises' => $pais];
        return \view('paises.index', $data);
    }

    public function create()
    {
        $pais = $this->pais;
        $data = ['title' => 'Crear Pais', 'pais' => $pais, 'action' => 'create'];
        return \view('paises.form', $data);
    }

    public function store(Request $request)
    {
        
        $pais = new $this->pais;
        $pais->nombre = $request->input('nombre');
        $pais->save();
        return Redirect::route('indexPais')->with('success', true)->with('message', 'País creado con exito.');
    }

    public function edit($id)
    {
        $pais = $this->pais;
        $pais = $pais::find($id);
        $data = ['title' => 'Editar País', 'pais' => $pais, 'action' => 'edit'];
        return \view('paises.form', $data);
    }

    public function update($id, Request $request)
    {
        $pais = $this->pais;
        $pais = $pais::find($id);
        $pais->nombre = $request->input('nombre');
        $pais->save();
        return Redirect::route('indexPais')->with('success', true)->with('message', 'País actualizado con exito.');

    }
}
