<?php

namespace App\Web\User\Request;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest {
    public function rules(): array {
        return [
            'name' => ['required', 'string'],
            'address' => ['required', 'string'],
            'password' => ['required'],
        ];
    }
}
