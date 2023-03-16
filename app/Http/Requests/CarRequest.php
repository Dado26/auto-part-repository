<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'is_registered' => 'required|boolean',
            'registration_number' => 'required_if:is_registered,true'
        ];
    }

    public function messages()
    {
        return [
            'registration_number.required_if' => 'The registration number field is required when the car is registered.',
        ];
    }
}
