<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class AlumnoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true; // Cambia a false si implementas políticas (policies)
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        return [
            'nombre' => 'required|string|min:3|max:255',
            'curso'  => 'required|string|min:3|max:255',
            'edad'   => 'required|integer|min:5|max:18',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages()
    {
        return [
            'nombre.required' => 'El nombre del alumno es obligatorio.',
            'nombre.string'   => 'El nombre debe ser un texto válido.',
            'nombre.min'      => 'El nombre debe tener un mínimo de 3 caracteres.',
            'nombre.max'      => 'El nombre no puede superar los 255 caracteres.',
            'curso.required'  => 'El curso es obligatorio.',
            'curso.string'    => 'El curso debe ser un texto válido.',
            'curso.min'       => 'El curso debe tener un mínimo de 3 caracteres.',
            'curso.max'       => 'El curso no puede superar los 255 caracteres.',
            'edad.required'   => 'La edad es obligatoria.',
            'edad.integer'    => 'La edad debe ser un número entero.',
            'edad.min'        => 'La edad mínima permitida es 5 años.',
            'edad.max'        => 'La edad máxima permitida es 18 años.',
        ];
    }

    /**
     * Maneja una falla de validación.
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            redirect()->back()
                ->withErrors($validator)
                ->withInput()
        );
    }
}