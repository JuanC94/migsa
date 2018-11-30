<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ReportesController extends Controller
{

    protected $user;

    public function __construct(User $user)
    {
        parent::__construct();
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = $this->user;
        $user = $user::where('rol', 'Empresa')->orderBy('name', 'DESC')->get();
        $data = ['title' => 'Listado Empresas', 'empresas' => $user];
        return \view('reportes.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user , $numero)
    {
       
        $data_reportes = array();
        $sql_indices = "select pg.nombre as pagina  ,ind.nombre as indicador ,i.nombre as indice, (2.5 * r.valor)*i.estadio as valor_indice
                From Respuestas r 
                inner join indices i on i.id = r.indice_id
                inner join indicadores ind on ind.id = i.indicador_id
                inner join paginas pg on pg.id = ind.pagina_id
                inner join users u on u.id = r.user_id
                where u.id = '". $user ."' and  u.numero_reporte = '" . $numero. "'
                group by i.indicador_id, pg.nombre, ind.nombre, i.nombre, (2.5 * r.valor)*i.estadio ;";

        $sql_indicadores = "select pg.nombre as pagina  ,ind.nombre as indicador , sum((2.5 * r.valor)*i.estadio)/count(*) as valor_indicador 
                From Respuestas r 
                inner join indices i on i.id = r.indice_id
                inner join indicadores ind on ind.id = i.indicador_id
                inner join paginas pg on pg.id = ind.pagina_id
                inner join users u on u.id = r.user_id
                where u.id = '". $user ."' and  u.numero_reporte = '" . $numero. "'
                group by i.indicador_id, pg.nombre, ind.nombre ;";
        $sql_pagina = "select pg.nombre as pagina , sum((2.5 * r.valor)*i.estadio)/count(*) as valor_ponderado_pagina 
                 From Respuestas r 
                 inner join indices i on i.id = r.indice_id
                 inner join indicadores ind on ind.id = i.indicador_id
                 inner join paginas pg on pg.id = ind.pagina_id
                inner join users u on u.id = r.user_id
                where u.id = '". $user ."' and  u.numero_reporte = '" . $numero. "'
                 group by pg.id ,  pg.nombre ;";
        $sql_dimension  ="select pg.dimension as dimension , sum((2.5 * r.valor)*i.estadio)/count(*) as valor_ponde_dimension 
                From Respuestas r 
                inner join indices i on i.id = r.indice_id
                inner join indicadores ind on ind.id = i.indicador_id
                inner join paginas pg on pg.id = ind.pagina_id
                inner join users u on u.id = r.user_id
                where u.id = '". $user ."' and  u.numero_reporte = '" . $numero. "'
                group by pg.dimension ;";
        $sql_propiedad = "select pg.propiedad as propiedad , sum((2.5 * r.valor)*i.estadio)/count(*) as valor_ponde_propiedad 
                From Respuestas r 
                inner join indices i on i.id = r.indice_id
                inner join indicadores ind on ind.id = i.indicador_id
                inner join paginas pg on pg.id = ind.pagina_id
                inner join users u on u.id = r.user_id
                where u.id = '". $user ."' and  u.numero_reporte = '" . $numero. "'
                group by pg.propiedad  ;";

        array_push($data_reportes,DB::select($sql_indices), DB::select($sql_indicadores), DB::select($sql_pagina), DB::select($sql_dimension), DB::select($sql_propiedad) );
    
        $data = ['title' => 'Reportes', 'data_reportes' => $data_reportes];
        return \view('reportes.home', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
