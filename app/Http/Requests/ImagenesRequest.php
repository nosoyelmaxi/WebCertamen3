<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ImagenesRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => 'required|min:3|max:20',
            'archivo' => 'required|image',
        ];
    }

    public function messages():array
    {
        return [
            'titulo.required' => 'Indique el titulo de la imagen',
            'titulo.min:3' => 'El titulo debe tener entre 3 y 20 caracteres',
            'titulo.max:20' => 'El titulo debe tener entre 3 y 20 caracteres',
            'archivo.required' => 'Ingrese una imagen',
            'archivo.image' => 'Ingrese una imagen',
        ];
    }
}
