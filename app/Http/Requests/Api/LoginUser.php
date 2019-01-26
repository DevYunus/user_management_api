<?php

namespace App\Http\Requests\Api;

class LoginUser extends ApiRequest
{
    /**
     * Get data to be validated from the request.
     *
     * @return array
     */
    public function requestAttributes()
    {
        return [
            'email' => $this->input('email'),
            'password' =>$this->input('password')
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ];
    }
}
