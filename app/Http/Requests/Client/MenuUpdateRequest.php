<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class MenuUpdateRequest extends FormRequest
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
            'menu_name'     => 'required|string',
            'menu_price'    => 'required|numeric',
            'menu_image'    => 'nullable|mimes:jpg,jpeg,png',
            'status'        => 'required|in:0,1',
        ];
    }

    public function messages()
    {
        return [
            'menu_name.required'    => 'Menu Name is Required.',
            'menu_name.string'      => 'Provide Valid Menu Name.',
            'menu_price.required'   => 'Menu Price is Required.',
            'menu_price.numeric'    => 'Provide Valid Menu Price.',
            'menu_image.mimes'      => 'Menu Image Must be jpg, jpeg or png format.',
            'status.required'       => 'Menu Status is Required.',
            'status.in'             => 'Provide Vliad Menu Status.',
        ];
    }
}
