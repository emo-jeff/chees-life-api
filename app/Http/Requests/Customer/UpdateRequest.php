<?php

namespace App\Http\Requests\Customer;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user() && auth()->user()->can('update#customer');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        $customer = $this->route('customer');
        return [
            'name' => 'required|string',
            'gender' => 'required|string',
            'birthday' => 'required|date',
            'hkid' => ['required', 'string', Rule::unique('customers')->ignore($customer->id ?? '')],
            'tel' => 'required|string',
            'email' => ['required', 'email', Rule::unique('customers')->ignore($customer->id ?? '')],
            'address' => 'nullable|string',
            'password' => 'nullable|string',
            'is_verified' => 'required|bool'
        ];
    }
}
