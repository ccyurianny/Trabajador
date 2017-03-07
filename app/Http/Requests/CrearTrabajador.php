<?php

namespace CrudTrabajador\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearTrabajador extends FormRequest
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
            'cedula' => 'required|unique:trabajador',
            'nombre' => 'required|string|max:60',
            'apellido' => 'required|string|max:60',
            'correo' => 'required|unique:trabajador',
            'estatus' => 'required|in:Activo,Inactivo',
            'idcargo' => 'required'
        ];
    }
}
