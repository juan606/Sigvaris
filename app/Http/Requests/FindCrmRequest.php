<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FindCrmRequest extends FormRequest
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
        return [
            'fechaInicioBusqueda' => 'required',
            'fechaFinBusqueda' => 'required'
        ];
    }

    public function messages(){
        return [
            'fechaInicioBusqueda.required' => 'Es necesario colocar un valor en la fecha de inicio',
            'fechaFinBusqueda.required' => 'Es necesario colocar un valor en la fecha de fin',
        ];
    }
}
