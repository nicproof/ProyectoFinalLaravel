<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class ActividadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true; // Cambia a false si necesitas autorización más estricta
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        return [
            'nombre' => 'required|string|min:3|max:255',
            'descripcion' => 'required',
            'dia' => 'required|in:lunes,martes,miércoles,jueves,viernes',
            'hora_inicio' => 'required',
            'hora_fin' => 'required|after:hora_inicio',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser un texto.',
            'nombre.min'=> 'El nombre debe tener un mínimo de 3 caracteres.',
            'nombre.max' => 'El nombre no puede superar los 255 caracteres.',
            'descripcion.required' => 'La descripción es obligatoria.',
            'dia.required' => 'El día es obligatorio.',
            'dia.in' => 'El día debe ser uno de: lunes, martes, miércoles, jueves o viernes.',
            'hora_inicio.required' => 'La hora de inicio es obligatoria.',
            'hora_fin.required' => 'La hora de fin es obligatoria.',
            'hora_fin.after' => 'La hora de fin debe ser posterior a la hora de inicio.',
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