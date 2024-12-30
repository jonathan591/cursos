<?php

namespace App\Http\Controllers;

use App\Models\Carrusel;
use App\Models\Course;
use App\Models\IncriptionStudiant;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cursos =Course::all();
        $carrucel= Carrusel::all();
        return view('index',compact('cursos','carrucel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $curso = Course::where('cupos', '>', 0)->get();

        return view('home.create',compact('curso'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id_curso = $request->input('course_id');
        $curso = Course::find($id_curso);
    
        // Verificar si el curso existe y tiene cupos disponibles
        if ($curso && $curso->cupos > 0) {
            // Validar los datos del formulario
            $data = $request->validate([
                'nombres' => 'required|string|max:255',
                'apellidos' => 'required|string|max:255',
                'telefono' => 'required|digits:10',
                'correo' => 'required|email',
                'cedula' => 'required|digits:10',
                'course_id' => 'required|exists:courses,id', 
            ],[
                'nombres.required' => 'El campo nombres es obligatorio.',
                'apellidos.required' => 'El campo apellidos es obligatorio.',
                'telefono.required' => 'El campo teléfono es obligatorio.',
                'telefono.digits' => 'El campo teléfono de tener 10 digitos.',
                'correo.required' => 'El campo correo electrónico es obligatorio.',
                'correo.email' => 'El correo debe tener un formato válido.',
                'cedula.required' => 'El campo cédula es obligatorio.',
                'cedula.digits' => 'La cédula debe  de tener 10 digitos.',
                'course_id.exists' => 'El curso seleccionado no es válido.',
            ]);

            // Crear la inscripción
            IncriptionStudiant::create($data);
    
            // Disminuir el cupo del curso
            $curso->decrement('cupos'); // Disminuye el número de cupos en 1
    
    
            return redirect()->route('home.create')->with('success', 'Inscripcion registrado correctamnete .');
        } else {
        
            return redirect()->route('home.create')->with('danger', 'Cupos agotados de esta curso.');
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
   

    /**
     * Remove the specified resource from storage.
     */
 
}
