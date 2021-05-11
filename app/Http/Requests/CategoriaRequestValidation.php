<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaRequestValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'nome.min' => 'O título deve ter pelo menos 3 caracteres ou no máximo 150.',
            'nome.unique' => 'O título já existe.',
            'nome.max' => 'O título deve ter pelo menos 3 caracteres ou no máximo 150.', 
            'slug.min' => 'A slug deve ter pelo menos 3 caracteres ou no máximo 150.',
            'slug.unique' => 'A slug já existe.',
            'slug.max' => 'O título deve ter pelo menos 3 caracteres ou no máximo 150.',
            'required'  => 'O campo :attribute é obrigatório.'
        ];
    }

    public function rules()
    {
        return [
            'nome' => 'required|unique:categorias|min:3|max:150',
            'slug' => 'required|unique:categorias|min:3|max:150',
        ];
    }
}
