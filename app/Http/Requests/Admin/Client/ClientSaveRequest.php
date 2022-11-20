<?php

namespace App\Http\Requests\Admin\Client;

use Illuminate\Foundation\Http\FormRequest;

class ClientSaveRequest extends FormRequest
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
            'first_name'            => 'required|string',
            'last_name'             => 'required|string',
            'email'                 => 'required|string|email|max:255|unique:users,email',
            'password'              => 'required|string|min:8',
            'client_phone_one'      => 'required|min:11|max:11',
            'client_phone_two'      => 'nullable|min:11|max:11',
            'resturant_name'        => 'required|string',
            'resturant_location'    => 'required|string',
            'url_status'            => 'required|in:0,1',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required'           => 'First Name is Required.',
            'first_name.string'             => 'Provide Valid First Name.',
            'last_name.required'            => 'Last Name is Required.',
            'last_name.string'              => 'Provide Valid Last Name.',
            'email.required'                => 'Email is Required.',
            'email.string'                  => 'Provide Valid Email.',
            'email.email'                   => 'Provide Valid Email.',
            'email.max'                     => 'Provide Valid Email.',
            'email.unique'                  => 'This Email Already Exist.',
            'password.required'             => 'Password is Required.',
            'password.string'               => 'Provide Valid Password.',
            'password.min'                  => 'Password Leanth must be Greater than 8 Charecter.',
            'password.min'                  => 'Password Leanth must be Greater than 8 Charecter.',
            'client_phone_one.required'     => 'Phone Number is required.',
            'client_phone_one.min'          => 'Provide Valid Phone Number.',
            'client_phone_one.max'          => 'Provide Valid Phone Number.',
            'client_phone_two.min'          => 'Provide Valid Phone Number Optional.',
            'client_phone_two.max'          => 'Provide Valid Phone Number Optional.',
            'resturant_name.required'       => 'Resturant Name is Required.',
            'resturant_name.string'         => 'Provide Valid Resturant Name.',
            'resturant_location.required'   => 'Resturant Location is Required.',
            'resturant_location.string'     => 'Provide Valid Resturant Location.',
            'url_status.required'           => 'Active Status is Required.',
            'url_status.in'                 => 'Provide Valid Active Status.',
        ];
    }
}
