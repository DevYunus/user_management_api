<?php

namespace App\Http\Requests\Api;

use Carbon\Carbon;

class UserRequest extends ApiRequest
{
    /**
     * Get data to be validated from the request.
     *
     * @return array
     */
    public function requestAttributes()
    {
        $attributes = [
            'first_name' => $this->input('firstName'),
            'last_name' => $this->input('lastName'),
            'phone' => $this->input('phone'),
            'email' => $this->input('email'),
        ];

        if ($this->has('password')) {
            $attributes += ['password' => $this->input('password')];
        }

        return $attributes;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'phone' => 'required|max:255',
        ];

        if ($this->isMethod('PUT')) {
            $rules += ['email' => 'required|email|max:255|unique:users,email,' . $this->route('user')->id];
        }

        if ($this->isMethod('POST')) {
            $rules += ['email' => 'required|email|max:255|unique:users,email','password'=>'required|min:6'];
        }

        return $rules;
    }
}
