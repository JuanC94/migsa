@php
$paginas = \App\Pagina::all();
@endphp
<div class="sidebar-wrapper">
    <ul class="nav">
        <li class="">
            <a href="{{ url('/home') }}">
                <i class="fa fa-home"></i>
                <p>Inicio</p>
            </a>
        </li>
        @foreach($paginas as $pagina)
            <li class="">
                <a href="{{ url('/respuestas/' . $pagina->id) }}">
                    <i class="fa fa-angle-double-right"></i>
                    <p>{{ $pagina->nombre }}</p>
                </a>
            </li>
        @endforeach
    </ul>
</div>