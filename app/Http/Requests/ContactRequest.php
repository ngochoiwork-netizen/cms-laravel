<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => [
                'required',
                'string',
                'max:100',
            ],

            'last_name' => [
                'nullable',
                'string',
                'max:100',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
            ],

            'phone' => [
                'nullable',
                'string',
                'max:30',
            ],

            'message' => [
                'required',
                'string',
                'max:5000',
            ],

            'sms_consent' => [
                'required',
                'accepted',
            ],

            'marketing_sms_consent' => [
                'required',
                'accepted',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'Please enter your first name.',

            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',

            'message.required' => 'Please enter your message.',

            'sms_consent.required' => 'Please accept the SMS consent.',
            'sms_consent.accepted' => 'Please accept the SMS consent.',

            'marketing_sms_consent.required' => 'Please accept the promotional SMS consent.',
            'marketing_sms_consent.accepted' => 'Please accept the promotional SMS consent.',
        ];
    }
}
