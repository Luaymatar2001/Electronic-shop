<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productRequest extends FormRequest
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
            'price'=>'required|numeric|min:1',
            'image'=>'required',
            'discount'=>'nullable',
            'selStore'=>'required|numeric|max:1',
            'storeId'=>'required|numeric',
            'describe'=>'required|string',
            'category'=>'required|string',
            'quantity'=>'required|numeric|min:1'
            //
        ];
    }
    public function message()
    {[
        'name.required'=>'The name is require',
        'name.string'=>'The name must be String',

        'price.required'=>'The price is require',
        'price.numeric'=>'The price must be String',
        'price.min:1'=>'The lowest value can be (1)',

        'image.required'=>'The image is require',

        'selStore.required'=>'This select is require',
        'selStore.numeric'=>'The select must be numeric',
        'selStore.max:1'=>'The largest value can be (1)',

        'storeId.required'=>'Select store is require',
        'storeId.numeric'=>'The select must be numeric',

        'describe.required'=>'the describe is require',
        'describe.string'=>'The describe must be String',

        'category.required'=>'the category is require',
        'category.string'=>'The category must be String',

        'quantity.required'=>'the quantity is require',
        'quantity.numeric'=>'The quantity must be numeric',
        'quantity.min:1'=>'The lowest value can be (1)',
    ];
 }
}
