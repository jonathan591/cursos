@extends('layuat.head')

@section('contenido')
<hr>
<hr>
<section class="container mt-5">
    <br>
    <div class="row ">
        <div class="col-lg-8 mx-auto">
            <h2 class="text-center mb-4">Inscríbete en nuestros cursos gratuitos</h2>
            <p class="text-center">En el Punto de Encuentro ofrecemos una variedad de cursos para ayudarte a desarrollar nuevas habilidades. ¡Inscríbete ahora!</p>
            
            <!-- Mensajes de éxito o error -->
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @elseif (session('danger'))
            <div class="alert alert-danger">
                {{ session('danger') }}
            </div>
            @endif

            <!-- Mostrar errores de validación -->
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Formulario -->
            <form action="{{ route('home.store') }}" method="POST" class="border p-4 rounded shadow">
                @csrf
                <div class="mb-3">
                    <label for="nombres" class="form-label">Nombre Completo:</label>
                    <input type="text" id="nombres" name="nombres" class="form-control @error('nombres') is-invalid @enderror" value="{{ old('nombres') }}" required>
                    @error('nombres')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos Completo:</label>
                    <input type="text" id="apellidos" name="apellidos" class="form-control @error('apellidos') is-invalid @enderror" value="{{ old('apellidos') }}" required>
                    @error('apellidos')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo Electrónico:</label>
                    <input type="email" id="correo" name="correo" class="form-control @error('correo') is-invalid @enderror" value="{{ old('correo') }}" required>
                    @error('correo')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="cedula" class="form-label">Cédula:</label>
                    <input type="number" id="cedula" name="cedula" class="form-control @error('cedula') is-invalid @enderror" value="{{ old('cedula') }}" required>
                    @error('cedula')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono:</label>
                    <input type="number" id="telefono" name="telefono" class="form-control @error('telefono') is-invalid @enderror" value="{{ old('telefono') }}" required>
                    @error('telefono')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="course_id" class="form-label">Selecciona el Curso de tu Interés:</label>
                    <select id="course_id" name="course_id" class="form-select @error('course_id') is-invalid @enderror" required>
                        <option value="">Selecciona un curso</option>
                        @foreach ($curso as $cursos)
                        <option value="{{ $cursos->id }}" {{ old('course_id') == $cursos->id ? 'selected' : '' }}>{{ $cursos->titulo }}</option>
                        @endforeach
                    </select>
                    @error('course_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary w-100"><i class="bi bi-arrow-right-circle-fill"></i> Inscribirse</button>
            </form>
        </div>
    </div>
</section>
<br>
@endsection
