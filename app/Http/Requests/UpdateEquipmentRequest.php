<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEquipmentRequest extends FormRequest
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
            'type' => 'sometimes|required|string|max:255',
            'brand' => 'sometimes|required|string|max:255',
            'model' => 'sometimes|required|string|max:255',
            'serial_number' => 'sometimes|required|string|unique:equipment,serial_number,' . $this->equipment,
            'status' => 'sometimes|required|in:operational,maintenance,repair,decommissioned',
            'office_id' => 'sometimes|required|exists:offices,id',
            'specifications' => 'nullable|string',
            'purchase_date' => 'nullable|date',
            'warranty_expiration' => 'nullable|date|after:purchase_date'
        ];
    }

    public function messages()
    {
        return [
            'type.required' => 'El tipo de equipo es obligatorio',
            'brand.required' => 'La marca es obligatoria',
            'model.required' => 'El modelo es obligatorio',
            'serial_number.required' => 'El número de serie es obligatorio',
            'serial_number.unique' => 'Este número de serie ya está registrado',
            'status.required' => 'El estado es obligatorio',
            'status.in' => 'El estado seleccionado no es válido',
            'office_id.required' => 'La oficina es obligatoria',
            'office_id.exists' => 'La oficina seleccionada no existe',
            'warranty_expiration.after' => 'La fecha de expiración de garantía debe ser posterior a la fecha de compra'
        ];
    }
}
