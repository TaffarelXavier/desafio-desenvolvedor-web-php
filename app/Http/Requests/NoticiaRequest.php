<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticiaRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'titulo.min' => 'O título deve ter pelo menos 5 caracteres ou no máximo 150.',
            'titulo.unique' => 'O título já existe.',
            'titulo.max' => 'O título deve ter pelo menos 5 caracteres ou no máximo 150.',
            'required'  => 'O conteúdo do campo :attribute é obrigatório'
        ];
    }

    public function rules()
    {
        return [
            'titulo' => 'required|unique:noticias|min:5|max:150',
            'conteudo' => 'required',
            'categoria_id' => 'required|numeric',
        ];
    }
}
