<?php

namespace App\Http\Controllers\Auth;

use App\Apoderado;
use App\Http\Requests\ApoderadoRequest;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Auth;

class AuthApoderadoController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $loginView = 'apoderados.login';
    protected $registerView = 'apoderados.register';
    protected $guard = 'apoderado';
    

    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

 

    protected function validator(array $data)
    {
        return Validator::make($data, [
            "rut" => "required|unique:apoderados|unique:profesores|unique:administrativos|unique:alumnos",
            'nombre' => 'required|max:30',
            'apellido_paterno' => 'required|max:30',
            'apellido_materno' => 'required|max:30',
            'email' => 'required|email|max:255|unique:apoderados',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    protected function create(array $data)
    {
        return Apoderado::create([
            'rut' => $data['rut'],
            'nombre' => $data['nombre'],
            'apellido_paterno' => $data['apellido_paterno'],
            'apellido_materno' => $data['apellido_materno'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function register(ApoderadoRequest $request){
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        Auth::guard($this->getGuard())->login($this->create($request->all()));

        return redirect($this->redirectPath());
    }
}