<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDepartamento extends FormRequest
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
            'descripcion' => 'max:100',
            'nombre' => ['required','max:30', Rule::unique('departamentos')->ignore($this->departamento)],
        ];
    }

    public function messages()
    {
        return [
            'descripcion.max' => 'El campo descripción no debe ser mayor a 100 carácteres',
            'nombre.max' => 'El campo nombre no debe ser mayor a 30 carácteres',
            'nombre.required' => 'Debe ingresar un nombre',
            'nombre.unique' => 'El nombre ingresado ya se encuentra en el sistema, intente con otro diferente',
        ];
    }
}
