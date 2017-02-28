<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Http\Requests\CursoRequest; 

class CursosController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('profesor');
    }

    public function index(Request $request)
    {
        $cursos = Curso::search($request->nombre)->orderBy('id','ASC')->paginate(5);
        return view('cursos.index')->with('cursos',$cursos)->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cursos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CursoRequest $request)
    {
        $curso =  new Curso($request->all());
        $curso->save();
        flash('Curso ' .$curso->nombre.' agregado exitosamente!','success');
        return redirect()->route('cursos.index');
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
        $curso = Curso::find($id);
        return view('cursos.edit')->with('curso', $curso);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CursoRequest $request, $id)
    {
        $curso = Curso::find($id);
        $curso->nombre = $request->nombre;
        $curso->tipo = $request->tipo;
        $curso->save();
        flash('Curso ' .$curso->nombre.' editado exitosamente!','warning');
        return redirect()->route('cursos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curso=Curso::findOrFail($id);
        $curso->delete();
        flash('Curso eliminado exitosamente!','danger');
        return redirect()->route('cursos.index');
    }
}
