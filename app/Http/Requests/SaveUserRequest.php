<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SaveUserRequest extends Request
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
            'name'          => 'required|string|max:100',
            'email'         => 'required|email|max:255|unique:users',
            'password'      => 'required|string|min:6|confirmed',
            'user_type'     => 'required|in:superadmin,admin-A,admin-B,admin-C,admin-D,sell,user,createmode,dealer',
            'cell_phone'    => 'required|digits:11|unique:users',
            
           
        ];
    }
}
