<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RendezVouRequest extends FormRequest
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
			'clientID' => 'required',
			'vehiculeID' => 'required',
			'mecanicienId' => 'required',
			'date_rendez_vous' => 'required',
			'heure_rendez_vous' => 'required',
			'statut' => 'required',
        ];
    }
}
