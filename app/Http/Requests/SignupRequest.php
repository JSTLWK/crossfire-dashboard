<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email'    => ['required', 'email', 'unique:users,email'],
            'username' => ['required'],
            'teamName' => ['required', 'unique:teams,name'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
