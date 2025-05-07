<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTicketRequest extends FormRequest
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
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'status' => 'sometimes|required|in:open,in_progress,resolved,closed',
            'priority' => 'sometimes|required|in:low,medium,high,critical',
            'service_type' => 'sometimes|required|in:preventive,corrective,training,installation,other',
            'equipment_id' => 'sometimes|required|exists:equipment,id',
            'assigned_to' => 'nullable|exists:users,id',
            'resolution_notes' => 'required_if:status,resolved|nullable|string'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'El título del ticket es obligatorio',
            'title.max' => 'El título no puede exceder los 255 caracteres',
            'description.required' => 'La descripción es obligatoria',
            'status.required' => 'El estado es obligatorio',
            'status.in' => 'El estado seleccionado no es válido',
            'priority.required' => 'La prioridad es obligatoria',
            'priority.in' => 'La prioridad seleccionada no es válida',
            'service_type.required' => 'El tipo de servicio es obligatorio',
            'service_type.in' => 'El tipo de servicio seleccionado no es válido',
            'equipment_id.required' => 'El equipo es obligatorio',
            'equipment_id.exists' => 'El equipo seleccionado no existe',
            'assigned_to.exists' => 'El técnico seleccionado no existe',
            'resolution_notes.required_if' => 'Las notas de resolución son obligatorias cuando se marca como resuelto'
        ];
    }
}
