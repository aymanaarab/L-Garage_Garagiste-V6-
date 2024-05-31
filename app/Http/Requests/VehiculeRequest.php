<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehiculeRequest extends FormRequest
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
			'marque' => 'required|string',
			'modèle' => 'required|string',
			'type_carburant' => 'required|string',
			'immatriculation' => 'required|string',
			'photo' => 'string',
			'clientID' => 'required',
        ];
    }
}
