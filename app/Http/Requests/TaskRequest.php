<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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


    public function rules()
    {
        return [
            'title'=>'required',
            'done'=>'required|boolean'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Coloque o título!',
            'done.boolean'  => 'Coloque completo',
        ];
    }
}
