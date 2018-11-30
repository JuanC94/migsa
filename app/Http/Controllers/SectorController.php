<?php

namespace App\Http\Controllers;

use App\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SectorController extends Controller
{
    protected $sector;

    public function __construct(Sector $sector)
    {
        parent::__construct();
        $this->sector = $sector;
    }
    public function index()
    {
        $sector = $this->sector;
        $sector = $sector::all();
        $data = ['title' => 'Sector', 'sectores' => $sector];
        return \view('sectores.index', $data);
    }

    public function create()
    {
        $sector = $this->sector;
        $data = ['title' => 'Crear Sector', 'sectores' => $sector, 'action' => 'create'];
        return \view('sectores.form', $data);
    }

    public function store(Request $request)
    {
        
        $sector = new $this->sector;
        $sector->nombre = $request->input('nombre');
        $sector->estado = 1;
        $sector->save();
        return Redirect::route('indexSector')->with('success', true)->with('message', 'Sector creado con exito.');
    }

    public function edit($id)
    {
        $sector = $this->sector;
        $sector = $sector::find($id);
        $data = ['title' => 'Editar Sector', 'sectores' => $sector, 'action' => 'edit'];
        return \view('sectores.form', $data);
    }

    public function update($id, Request $request)
    {
        $sector = $this->sector;
        $sector = $sector::find($id);
        $sector->nombre = $request->input('nombre');
        $sector->estado = $request->input('estado');
        $sector->save();
        return Redirect::route('indexSector')->with('success', true)->with('message', 'Sector actualizado con exito.');

    }
}
