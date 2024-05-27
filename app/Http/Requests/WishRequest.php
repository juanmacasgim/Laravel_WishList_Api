<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class WishRequest
 * Esta clase se encarga de validar los datos que se envían a través de la API.
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
