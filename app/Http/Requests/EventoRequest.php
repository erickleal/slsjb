<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required|min:3|max:255',
            'descripcion' => 'required|min:5|max:2000',
           
        ];
    }
    public function messages()
    {
        return [
            'nombre.required' =>'El nombre de la noticia es obligatorio',
            'nombre.min' =>'El nombre debe contener al menos 5 caracteres',
            'nombre.max' => 'El nombre debe contener un maximo de 255 caracteres',
            'descripcion.required' => 'La descripcion de la noticia es obligatorio',
            'descripcion.min' => 'La descripcion debe contener como minimo 5 caracteres',
            'descripcion.max' => 'La descripcion debe contener como maximo 2000 caracteres',
            
        ];
    }
}
