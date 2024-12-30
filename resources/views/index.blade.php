@extends('layuat.head')


@section('contenido')
<section id="carouselExampleCaptions" class="carousel slide mt-4" data-bs-ride="carousel">
    <div class="carousel-indicators">
        @php
        $con = 0; // Iniciar el contador
        @endphp

        <!-- Botón para el primer slide (activo) -->
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>

        <!-- Botones dinámicos para los demás slides -->
        @foreach ($carrucel as $carrucels)
        @if ($con > 0) <!-- Solo los siguientes botones -->
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $con }}"
            aria-label="Slide {{ $con + 1 }}"></button>
        @endif
        @php
        $con++; // Incrementar el contador
        @endphp
        @endforeach
    </div>

    <div class="carousel-inner">
        @php
        $con = 0; // Iniciar el contador
        @endphp

        @foreach ($carrucel as $carrucels)
        <div class="carousel-item @if ($con == 0) active @endif">
            <div class="carousel-overlay"></div>
            <img src="{{ asset('storage/'.$carrucels->image) }}" class="d-block w-100 img-fluid" alt="{{ $carrucels->titulo }}"
                style="height: 600px;">
            <div class="carousel-caption text-start">
                <h1>{{ $carrucels->titulo }}</h1>
                <p class="opacity-75">{{ $carrucels->descripcion }}</p>
                <p><a class="btn btn-lg btn-primary" href="#vision"> <i class="bi bi-geo-alt-fill"></i> Visitanos</a></p>
            </div>
        </div>

        @php
        $con++; // Incrementar el contador
        @endphp
        @endforeach

    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
    </button>
</section>

<br>
<h2 class="text-center text-info"> <i class="bi bi-credit-card-2-front"></i> Cursos Disponibles </h2>
<!-- Cursos Section -->
<section class="container mt-5" id="inscripcion">
    <div class="row">
        <!-- Curso 1: Informática Básica -->

        @foreach ($cursos as $curso )
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <img src="{{ asset('storage/'.$curso->image) }}" class="card-img-top" style="height: 250px;" alt="Curso Informática Básica">
                <div class="card-body">
                    <h5 class="card-title">{{$curso->titulo}}</h5>
                    <p class="card-text">{{$curso->descripcion}}</p>
                    <p><strong>Fecha Inicio: </strong>{{$curso->fecha_inicio}}</p>
                    <p><strong>Cupos disponibles: {{$curso->cupos}}</strong></p>
                    @if ($curso->cupos >0)
                    <a href="{{ route('home.create') }}" class="btn btn-primary w-100"> <i class="bi bi-arrow-right-circle-fill"></i> Inscríbete</a>
                    @else
                    <button class="btn btn-secondary w-100" disabled>
                        <i class="bi bi-arrow-right-circle-fill"></i> Inscripción cerrada
                    </button>
                    @endif

                </div>
            </div>
        </div>
        @endforeach


        <!-- Curso 2: Programación -->



    </div>
</section>

<!-- Sección de Visión y Misión -->
<section class="container mt-4">
    <div class="row">
        <!-- Visión -->
        <div class="col-md-12" id="vision">
            <h2 class="text-center text-info"><i class="bi bi-geo-alt-fill"></i> Ubicacion Punto Digital</h2>
            <div id="map"></div>
        </div>
        <!-- Misión -->

    </div>
</section>
<br>


@endsection