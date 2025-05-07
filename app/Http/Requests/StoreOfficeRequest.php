<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOfficeRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'description' => 'nullable|string',
            'active' => 'boolean'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre de la oficina es obligatorio',
            'name.max' => 'El nombre no puede exceder los 255 caracteres',
            'location.required' => 'La ubicación es obligatoria',
            'location.max' => 'La ubicación no puede exceder los 255 caracteres',
            'department.required' => 'El departamento es obligatorio',
            'department.max' => 'El departamento no puede exceder los 255 caracteres'
        ];
    }
}
