<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyProfileRequest extends FormRequest
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
        'company_name' => 'string|max:255',
        'email' => 'email|max:255',
        'phone_number' => 'string|max:20',
        'website' => 'string|max:255',
        'est_since' => 'date',
        'team_size' => 'string|max:255',
        'category' => 'string|max:255',
        'allow_in_search' => 'boolean',
        'description' => 'string',
        'facebook' => 'string|max:255',
        'twitter' => 'string|max:255',
        'linkedin' => 'string|max:255',
        'google_plus' => 'string|max:255',
        'city' => 'string|max:255',
        'address' => 'string|max:255',
        ];
    }
}
