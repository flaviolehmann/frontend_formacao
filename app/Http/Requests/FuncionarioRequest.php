<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuncionarioRequest extends FormRequest
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
    public function rules()
    {
        // dd($this->all());
        return [
            'nome' => 'required|min:10|max:100',
            'sexo' => 'required|max:1',
            'data_aniversario' => 'required',
            'numero' => 'required|max:4',
            'rua' => 'required'
        ];
    }
}
