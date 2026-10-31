<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCallbackRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|min:2|max:60',
            'phone' => 'required|min:10|max:25',
            'comment' => 'nullable|max:500',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Введите имя',
            'name.min' => 'Имя слишком короткое',
            'phone.required' => 'Введите номер телефона',
            'phone.min' => 'Номер телефона слишком короткий',
        ];
    }
}
