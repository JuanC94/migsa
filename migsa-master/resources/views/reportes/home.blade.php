@extends('layouts.app')

@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="blue">
                    <h4 class="title">{{ $title }}</h4>
                </div>
                <div class="card-content table-responsive">
                    @include('message.message')
                    <!--dd($data_reportes)-->

                    @if(!empty($data_reportes['0']))

                        @php $text = 0; @endphp
                        @foreach($data_reportes as $reportes)
                            @if ($text == 0)
                                <div class="k-portlet k-portlet--height-fluid">
                                    <div class="k-portlet__head  k-portlet__head--noborder">
                                        <div class="k-portlet__head-label">         
                                            <h3 class="k-portlet__head-title">Indices</h3>
                                        </div>
                                    </div>
                                    <hr>    
                                </div>
                                <div class="row">
                                 @php $number_chart = 0; @endphp
                                 @foreach($reportes as $reporte)
                                    <div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">       
                                                <!--begin::Portlet-->
                                        <div class="k-portlet k-portlet--height-fluid">
                                            <div class="k-portlet__head  k-portlet__head--noborder">
                                                <div class="k-portlet__head-label">         
                                                    <h4 class="k-portlet__head-title">Pagina : {{$reporte->pagina}}</h4>
                                                </div>
                                            </div>
                                            <div class="k-portlet__body k-portlet__body--fluid">
                                                <div class="k-widget-20">
                                                    <div class="k-widget-20__title">
                                                        <div class="k-widget-20__label">Indicador :{{$reporte->indicador}}</div>
                                                        <div class="k-widget-20__label">Indice :{{$reporte->indice}}</div>
                                                    </div>
                                                    <div class="k-widget-20__data">
                                                        <div class="k-widget-20__chart">
                                                            <canvas id="indicador_char_{{$number_chart}}"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Portlet--> 
                                        </div>
                                        <script>
                                            var ctx = document.getElementById("indicador_char_{{$number_chart}}").getContext('2d');
                                            var myChart = new Chart(ctx, {
                                                type: 'horizontalBar',
                                                data: {
                                                    labels: ["Indice :{{$reporte->indice}}"],
                                                    datasets: [{
                                                        label: 'Indice :{{$reporte->indice}}',
                                                        data: [{{$reporte->valor_indice}}],
                                                        backgroundColor: [
                                                            '#{{substr(md5(time()), 0, 6)}}'
                                                        ],
                                                        borderColor: [
                                                            '#{{substr(md5(time()), 0, 6)}}'
                                                        ],
                                                        borderWidth: 1
                                                    }]
                                                },
                                                options: {
                                                    scales: {
                                                        yAxes: [{
                                                            ticks: {
                                                                beginAtZero:true
                                                            }
                                                        }]
                                                    }
                                                }
                                            });
                                            </script>
                                            @php $number_chart += 1; @endphp
                                @endforeach
                                </div>           
                            @elseif ($text == 1)
                                <div class="k-portlet k-portlet--height-fluid">
                                    <div class="k-portlet__head  k-portlet__head--noborder">
                                        <div class="k-portlet__head-label">         
                                            <h3 class="k-portlet__head-title">Indicadores</h3>
                                        </div>
                                    </div>
                                    <hr>  
                                    <div class="row">
                                     @php 
                                        $indi_ = array();
                                     @endphp
                                     @foreach($reportes as $reporte_indicadores)
                                         @php 
                                            if (array_key_exists($reporte_indicadores->pagina, $indi_)) {
                                                array_push($indi_[$reporte_indicadores->pagina], array('indicador' => $reporte_indicadores->indicador, 'valor_indicador' => $reporte_indicadores->valor_indicador));
                                            }else{
                                                //array_push($indi_,array($reporte_indicadores->pagina));
                                                $indi_[$reporte_indicadores->pagina] = array(array('indicador' => $reporte_indicadores->indicador, 'valor_indicador' => $reporte_indicadores->valor_indicador));
                                            }
                                         @endphp
                                    @endforeach

                                    <div class="col-lg-12 col-xl-8 order-lg-1 order-xl-1">       
                                    <!--begin::Portlet-->
                                        <div class="k-portlet k-portlet--height-fluid">
                                            <div class="k-portlet__head  k-portlet__head--noborder">
                                                <div class="k-portlet__head-label">         
                                                     <h4 class="k-portlet__head-title">Pagina : {{$reporte_indicadores->pagina}}</h4>
                                                </div>
                                            </div>
                                    @php 
                                        $labels_imprimir = ""; 
                                        $datos_imprimir = ""; 
                                        $colores_imprimir = ""; 
                                    @endphp
                                    @foreach($indi_ as $_reporte_indicadores) 
                                        @foreach($_reporte_indicadores as $_valores)                                    
                                        @php
                                            if (empty($labels_imprimir)){                                      
                                               $labels_imprimir .=  "|" .  $_valores['indicador'] . "|"; 
                                               $datos_imprimir .= "|" .  $_valores['valor_indicador'] . "|"; 
                                               $colores_imprimir .=  "|#". substr(md5(time()), 12, 6). "|"; 
                                            }else{
                                               $labels_imprimir .= ",|" . $_valores['indicador']. "|"; 
                                               $datos_imprimir .= ",|" . $_valores['valor_indicador']. "|"; 
                                               $colores_imprimir .=  ",|#". substr(md5(time()),12, 6). "|"; 
                                            }
                                        @endphp
                                        @endforeach
                                        
                                             <div class="k-portlet__body k-portlet__body--fluid">
                                                <div class="k-widget-20__data">
                                                    <div class="k-widget-20__chart">
                                                        <canvas id="indicadores_char_{{$number_chart}}"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                            <script>
                                                var ctx = document.getElementById("indicadores_char_{{$number_chart}}").getContext('2d');
                                                var myChart = new Chart(ctx, {
                                                    type: 'horizontalBar',
                                                    data: {

                                                        labels: [@php echo str_replace('|',"'",$labels_imprimir) @endphp ],
                                                        datasets: [{
                                                            label: 'Pagina : {{{$reporte_indicadores->pagina}}}',
                                                            data: [ @php echo str_replace('|',"'",$datos_imprimir) @endphp ],
                                                            backgroundColor: [
                                                                @php echo str_replace('|',"'",$colores_imprimir) @endphp
                                                            ],
                                                            borderColor: [
                                                                @php echo str_replace('|',"'",$colores_imprimir) @endphp
                                                            ],
                                                            borderWidth: 1
                                                        }]
                                                    },
                                                    options: {
                                                        scales: {
                                                            yAxes: [{
                                                                ticks: {
                                                                    beginAtZero:true
                                                                }
                                                            }]
                                                        }
                                                    }
                                                });
                                                </script>
                                                @php $number_chart += 1; @endphp
                                    @endforeach
                                        </div>
                                            <!--end::Portlet--> 
                                    </div>
                                </div>
                            @elseif ($text == 2)
                                <div class="k-portlet k-portlet--height-fluid">
                                    <div class="k-portlet__head  k-portlet__head--noborder">
                                        <div class="k-portlet__head-label">         
                                            <h3 class="k-portlet__head-title">Paginas</h3>
                                        </div>
                                    </div>
                                    <hr> 
                                    <div class="row">
                                     @php 
                                        $arraypagina = array();
                                     @endphp
                                     @foreach($reportes as $reporte_pag)
                                         @php 
                                            if (array_key_exists($reporte_pag->pagina, $arraypagina)) {
                                                array_push($arraypagina[$reporte_pag->pagina], array('valor_ponderado_pagina' => $reporte_pag->valor_ponderado_pagina));
                                            }else{
                                                //array_push($arraypagina,array($reporte_pag->pagina));
                                                $arraypagina[$reporte_pag->pagina] = array(array('valor_ponderado_pagina' => $reporte_pag->valor_ponderado_pagina));
                                            }
                                         @endphp
                                    @endforeach

                                    <div class="col-lg-12 col-xl-8 order-lg-1 order-xl-1">       
                                    <!--begin::Portlet-->
                                        <div class="k-portlet k-portlet--height-fluid">
                                            <div class="k-portlet__head  k-portlet__head--noborder">
                                                <div class="k-portlet__head-label">         
                                                     <h4 class="k-portlet__head-title">Pagina : {{$reporte_pag->pagina}}</h4>
                                                </div>
                                            </div>
                                    @php 
                                        $labels_imprimir = ""; 
                                        $datos_imprimir = ""; 
                                        $colores_imprimir = ""; 
                                    @endphp
                                    @foreach($arraypagina as $_reporte_pag) 
                                        @foreach($_reporte_pag as $_valores)                                                                        
                                        @php
                                            if (empty($datos_imprimir)){                                      
                                              $labels_imprimir .=  "|" . $reporte_pag->pagina. "|"; 
                                              $datos_imprimir .= "|" .  $_valores['valor_ponderado_pagina'] . "|"; 
                                              $colores_imprimir .=  "|#". substr(md5(time()), 26, 6). "|"; 
                                            }else{
                                              $labels_imprimir .= ",|" . $reporte_pag->pagina. "|"; 
                                              $datos_imprimir .= ",|" . $_valores['valor_ponderado_pagina']. "|"; 
                                              $colores_imprimir .=  ",|#". substr(md5(time()),26, 6). "|"; 
                                            }
                                        @endphp
                                        @endforeach
                                        
                                             <div class="k-portlet__body k-portlet__body--fluid">
                                                <div class="k-widget-20__data">
                                                    <div class="k-widget-20__chart">
                                                        <canvas id="indicadores_char_{{$number_chart}}"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                            <script>
                                                var ctx = document.getElementById("indicadores_char_{{$number_chart}}").getContext('2d');
                                                var myChart = new Chart(ctx, {
                                                    type: 'pie',
                                                    data: {

                                                        labels: [@php echo str_replace('|',"'",$labels_imprimir) @endphp ],
                                                        datasets: [{
                                                            label: 'Pagina : {{{$reporte_indicadores->pagina}}}',
                                                            data: [ @php echo str_replace('|',"'",$datos_imprimir) @endphp ],
                                                            backgroundColor: [
                                                                @php echo str_replace('|',"'",$colores_imprimir) @endphp
                                                            ],
                                                            borderColor: [
                                                                @php echo str_replace('|',"'",$colores_imprimir) @endphp
                                                            ],
                                                            borderWidth: 1
                                                        }]
                                                    }
                                                });
                                                </script>
                                                @php $number_chart += 1; @endphp
                                    @endforeach
                                        </div>
                                            <!--end::Portlet--> 
                                    </div>


                                </div>
                            @elseif ($text == 3)
                                <div class="k-portlet k-portlet--height-fluid">
                                    <div class="k-portlet__head  k-portlet__head--noborder">
                                        <div class="k-portlet__head-label">         
                                            <h3 class="k-portlet__head-title">Dimensiones</h3>
                                        </div>
                                    </div>
                                    <hr>   
                                    <div class="row">
                                     @php 
                                        $arraydimensiones = array();
                                     @endphp
                                     @foreach($reportes as $reporte_dimensiones)
                                         @php 
                                            if (array_key_exists($reporte_dimensiones->dimension, $arraydimensiones)) {
                                                array_push($arraydimensiones[$reporte_dimensiones->pagina], array('valor_ponde_dimension' => $reporte_dimensiones->valor_ponde_dimension));
                                            }else{
                                                $arraydimensiones[$reporte_dimensiones->dimension] = array(array('valor_ponde_dimension' => $reporte_dimensiones->valor_ponde_dimension));
                                            }
                                         @endphp
                                    @endforeach

                                    <div class="col-lg-12 col-xl-8 order-lg-1 order-xl-1">       
                                    <!--begin::Portlet-->
                                        <div class="k-portlet k-portlet--height-fluid">
                                            <div class="k-portlet__head  k-portlet__head--noborder">
                                                <div class="k-portlet__head-label">         
                                                     <h4 class="k-portlet__head-title">Dimensión : {{$reporte_dimensiones->dimension}}</h4>
                                                </div>
                                            </div>
                                    @php 
                                        $labels_imprimir = ""; 
                                        $datos_imprimir = ""; 
                                        $colores_imprimir = ""; 
                                    @endphp
                                    @foreach($arraydimensiones as $_reporte_dimen) 
                                        @foreach($_reporte_dimen as $_valores)                                                                        
                                        @php
                                            if (empty($datos_imprimir)){                                      
                                              $labels_imprimir .=  "|" . $reporte_dimensiones->dimension. "|"; 
                                              $datos_imprimir .= "|" .  $_valores['valor_ponde_dimension'] . "|"; 
                                              $colores_imprimir .=  "|#". substr(md5(time()), 6, 6). "|"; 
                                            }else{
                                              $labels_imprimir .= ",|" . $_reporte_dimen->dimension. "|"; 
                                              $datos_imprimir .= ",|" . $_valores['valor_ponde_dimension']. "|"; 
                                              $colores_imprimir .=  ",|#". substr(md5(time()),6, 6). "|"; 
                                            }
                                        @endphp
                                        @endforeach
                                        
                                             <div class="k-portlet__body k-portlet__body--fluid">
                                                <div class="k-widget-20__data">
                                                    <div class="k-widget-20__chart">
                                                        <canvas id="indicadores_char_{{$number_chart}}"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                            <script>
                                                var ctx = document.getElementById("indicadores_char_{{$number_chart}}").getContext('2d');
                                                var myChart = new Chart(ctx, {
                                                    type: 'horizontalBar',
                                                    data: {

                                                        labels: [@php echo str_replace('|',"'",$labels_imprimir) @endphp ],
                                                        datasets: [{
                                                            label: 'Dimesión : {{{$reporte_indicadores->pagina}}}',
                                                            data: [ @php echo str_replace('|',"'",$datos_imprimir) @endphp ],
                                                            backgroundColor: [
                                                                @php echo str_replace('|',"'",$colores_imprimir) @endphp
                                                            ],
                                                            borderColor: [
                                                                @php echo str_replace('|',"'",$colores_imprimir) @endphp
                                                            ],
                                                            borderWidth: 1
                                                        }]
                                                    },
                                                    options: {
                                                        scales: {
                                                            yAxes: [{
                                                                ticks: {
                                                                    beginAtZero:true
                                                                }
                                                            }]
                                                        }
                                                    }
                                                });
                                                </script>
                                                @php $number_chart += 1; @endphp
                                    @endforeach
                                        </div>
                                            <!--end::Portlet--> 
                                    </div>

                                </div>
                            @elseif ($text == 4)
                                <div class="k-portlet k-portlet--height-fluid">
                                    <div class="k-portlet__head  k-portlet__head--noborder">
                                        <div class="k-portlet__head-label">         
                                            <h3 class="k-portlet__head-title">Propiedades</h3>
                                        </div>
                                    </div>
                                    <hr>    
                                    <div class="row">
                                     @php 
                                        $arraypropiedades = array();
                                     @endphp
                                     @foreach($reportes as $reporte_propiedades)
                                         @php 
                                            if (array_key_exists($reporte_propiedades->propiedad, $arraypropiedades)) {
                                                array_push($arraypropiedades[$reporte_propiedades->propiedad], array('valor_ponde_propiedad' => $reporte_propiedades->valor_ponde_propiedad));
                                            }else{
                                                $arraypropiedades[$reporte_propiedades->propiedad] = array(array('valor_ponde_propiedad' => $reporte_propiedades->valor_ponde_propiedad));
                                            }
                                         @endphp
                                    @endforeach

                                    <div class="col-lg-12 col-xl-8 order-lg-1 order-xl-1">       
                                    <!--begin::Portlet-->
                                        <div class="k-portlet k-portlet--height-fluid">
                                            <div class="k-portlet__head  k-portlet__head--noborder">
                                                <div class="k-portlet__head-label">         
                                                     <h4 class="k-portlet__head-title">Propiedad : {{$reporte_propiedades->propiedad}}</h4>
                                                </div>
                                            </div>
                                    @php 
                                        $labels_imprimir = ""; 
                                        $datos_imprimir = ""; 
                                        $colores_imprimir = ""; 
                                    @endphp
                                    @foreach($arraypropiedades as $_reporte_prop) 
                                        @foreach($_reporte_prop as $_valores)                                                                        
                                        @php
                                            if (empty($datos_imprimir)){                                      
                                              $labels_imprimir .=  "|" . $reporte_propiedades->propiedad. "|"; 
                                              $datos_imprimir .= "|" .  $_valores['valor_ponde_propiedad'] . "|"; 
                                              $colores_imprimir .=  "|#". substr(md5(time()), 20, 6). "|"; 
                                            }else{
                                              $labels_imprimir .= ",|" . $reporte_propiedades->propiedad. "|"; 
                                              $datos_imprimir .= ",|" . $_valores['valor_ponde_propiedad']. "|"; 
                                              $colores_imprimir .=  ",|#". substr(md5(time()),20, 6). "|"; 
                                            }
                                        @endphp
                                        @endforeach
                                        
                                             <div class="k-portlet__body k-portlet__body--fluid">
                                                <div class="k-widget-20__data">
                                                    <div class="k-widget-20__chart">
                                                        <canvas id="indicadores_char_{{$number_chart}}"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                            <script>
                                                var ctx = document.getElementById("indicadores_char_{{$number_chart}}").getContext('2d');
                                                var myChart = new Chart(ctx, {
                                                    type: 'horizontalBar',
                                                    data: {

                                                        labels: [@php echo str_replace('|',"'",$labels_imprimir) @endphp ],
                                                        datasets: [{
                                                            label: 'Propiedad : {{{$reporte_indicadores->pagina}}}',
                                                            data: [ @php echo str_replace('|',"'",$datos_imprimir) @endphp ],
                                                            backgroundColor: [
                                                                @php echo str_replace('|',"'",$colores_imprimir) @endphp
                                                            ],
                                                            borderColor: [
                                                                @php echo str_replace('|',"'",$colores_imprimir) @endphp
                                                            ],
                                                            borderWidth: 1
                                                        }]
                                                    },
                                                    options: {
                                                        scales: {
                                                            yAxes: [{
                                                                ticks: {
                                                                    beginAtZero:true
                                                                }
                                                            }]
                                                        }
                                                    }
                                                });
                                                </script>
                                                @php $number_chart += 1; @endphp
                                    @endforeach
                                        </div>
                                            <!--end::Portlet--> 
                                    </div>

                                </div>
                            @endif
                            <br>
                            @php $text +=1;  @endphp
                        @endforeach
                @else
                    <div class="card-header" data-background-color="red">
                        <h4 class="title">No hay datos</h4>
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>
@endsection