<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [ 
        'name'=>'required|string',
        'email'=> 'required',
        'describe'=> 'required|string',
        'image'=> 'required'
           
        ];
    }

    public function message()
    {
       return [
        'name.required'=>'The name is require',
        'name.string'=>'The name must be String',
        'email.required'=> 'The email is require',
        'describe.required'=> 'The describe is require',
        'describe.string'=>'The describe must be String',
        'image.required'=> 'The image is require'

       ];
    }
}
