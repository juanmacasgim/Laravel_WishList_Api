<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class WishRequest
 * This class is responsible for validating the request data.
 */
class WishRequest extends FormRequest
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
            'id' => 'integer',
            'title' => 'required|string',
            'text' => 'required|string',
            'isCompleted' => 'required|boolean',
            'date' => 'required|string',
        ];
    }
}
