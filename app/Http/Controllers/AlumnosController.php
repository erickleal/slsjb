<?php 

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Alumno;
use App\Curso;
use App\Apoderado;
use App\Http\Requests\AlumnoRequest; 
use Illuminate\Support\Facades\Input;

class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $alumnos = Alumno::search($request->nombre)->orderBy('apellido_paterno','ASC')->paginate(5);
        return view('alumnos.index')->with('alumnos',$alumnos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
    	$cursos = Curso::orderBy('nombre','ASC')->pluck('nombre','id');
    	$apoderados = Apoderado::orderBy('apellido_paterno','ASC')->pluck('nombre','id');
        return view('alumnos.create')->with('cursos',$cursos)->with('apoderados',$apoderados);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlumnoRequest $request)
    {
        $alumno = new Alumno($request->all());
        //Manipulacion de Imagenes
        if(Input::hasFile('foto')){
            $file=Input::file('foto');
            $file->move(public_path().'/imagenes/alumnos',$file->getClientOriginalName());
            $alumno->foto=$file->getClientOriginalName();
        }

        
        $alumno->save();
        flash('Alumno' .$alumno->nombre.' agregado exitosamente!','success');
        return redirect()->route('alumnos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) 
    {
    	$alumno = Alumno::find($id);
    	$alumno->curso;
    	$cursos	= Curso::orderBy('id','ASC')->pluck('nombre','id');  
    	$alumno->apoderado;
    	$apoderados = Apoderado::orderBy('apellido_paterno','ASC')->pluck('nombre','id');    
        return view('alumnos.edit')->with('alumno', $alumno)->with('cursos',$cursos)->with('apoderados',$apoderados);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlumnoRequest $request, $id)
    {
        $alumno = Alumno::find($id);
        $alumno->fill($request->all());

        if(Input::hasFile('foto')){
            $file=Input::file('foto');
            $file->move(public_path().'/imagenes/alumnos',$file->getClientOriginalName());
            $alumno->foto=$file->getClientOriginalName();
        }


        $alumno->save();
        flash('Alumno ' .$alumno->nombre.' editado exitosamente!','warning');
        return redirect()->route('alumnos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alumno=Alumno::findOrFail($id);
        $alumno->delete();
        flash('Alumno eliminado exitosamente!','danger');
        return redirect()->route('alumnos.index');
    }
}