<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required',
            'about' => 'required',
            'image' => 'required',
            'github' => 'required',
            'city' => 'required',
            'is_finished' => 'required',
            'phone' => 'required',
            'birthday' => 'required',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
