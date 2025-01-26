<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNutsIndustryMixerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Allow all users to make the request
        // return auth()->user() && auth()->user()->is_admin; // Example condition
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'type_of_nuts' => 'required|string|max:255',
            'quantity_of_pistachio' => 'nullable|string|max:50',
            'quantity_of_regular_cashew' => 'nullable|string|max:50',
            'quantity_of_smoked_cashew' => 'nullable|string|max:50',
            'quantity_of_hazelnut' => 'nullable|string|max:50',
            'quantity_of_regular_almond' => 'nullable|string|max:50',
            'quantity_of_smoked_almond' => 'nullable|string|max:50',
            'quantity_of_white_seed' => 'nullable|string|max:50',
            'quantity_of_freekeh_almond' => 'nullable|string|max:50',
            // 'quantity_of_sugar_salt' => 'nullable|string|max:50',
            // 'quantity_of_acid' => 'nullable|string|max:50',
            // 'glass_used' => 'nullable|boolean',
            'final_quantity' => 'nullable|string|max:50',
        ];
    }
}
