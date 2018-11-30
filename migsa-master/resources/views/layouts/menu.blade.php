@guest
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="">
                <a href="{{ url('/') }}">
                    <i class="fa fa-home"></i>
                    <p>Inicio</p>
                </a>
            </li>
        </ul>
    </div>
@else
    @if(Auth::user()->rol == 'Admin')
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li>
                <a href="{{ url('/home') }}">
                    <i class="fa fa-home"></i>
                    <p>Inicio</p>
                </a>
            </li>
            <li>
                <a href="{{ route('indexPagina') }}">
                    <i class="fa fa-calendar"></i>
                    <p>Páginas</p>
                </a>
            </li>
            <li>
                <a href="{{ route('indexIndicador') }}">
                    <i class="fa fa-male"></i>
                    <p>Indicadores</p>
                </a>
            </li>
            <li>
                <a href="{{ route('indexIndice') }}">
                    <i class="fa fa-support"></i>
                    <p>Indices</p>
                </a>
            </li>

            <li>
                <a href="{{ route('indexPais') }}">
                    <i class="fa fa-support"></i>
                    <p>Paises</p>
                </a>
            </li>
            <li>
                <a href="{{ route('indexSector') }}">
                    <i class="fa fa-support"></i>
                    <p>Sectores</p>
                </a>
            </li>
            <li>
                <a href="{{ route('reportes') }}">
                    <i class="fa fa-font-awesome"></i>
                    <p>Reportes</p>
                </a>
            </li>
        </ul>
    </div>
    @else
        @include('layouts.menu_empresas')
    @endif
@endguest