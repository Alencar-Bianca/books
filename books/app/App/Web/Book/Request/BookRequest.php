<?php

namespace App\Web\Book\Request;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest {
    public function rules(): array {
        return [
            'name' => ['required', 'string'],
            'ISBN' => ['required', 'int'],
            'value' => ['required', 'numeric'],
        ];
    }
}
