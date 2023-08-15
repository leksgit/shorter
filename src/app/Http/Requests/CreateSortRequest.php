<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSortRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'source_url' => ['required','url'],
            'allowed_number_of_uses' => ['required', 'integer','min:0'],
            'hours_available' => ['required', 'integer','min:1','max:24'],
        ];
    }
}
