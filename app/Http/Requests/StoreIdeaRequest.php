<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIdeaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'description' => ['required', 'string','min:10', 'max:1000'],
            'state' => ['required', 'in:pending,in_progress,completed'],
        ];
    }

    public function messages()
    {
        return [
            'description.required' => 'La descripción es obligatoria.',
            'description.string' => 'La descripción debe ser una cadena de texto.',
            'description.min' => 'La descripción debe tener al menos :min caracteres.',
            'description.max' => 'La descripción no puede tener más de :max caracteres.',
            'state.required' => 'El estado es obligatorio.',
            'state.in' => 'El estado debe ser uno de los siguientes: pending, in_progress, completed.',
        ];
    }
}
