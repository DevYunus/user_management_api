<?php

namespace App\Http\Requests\Api;

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
            'name' => $this->input('name'),
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
            'name' => 'required|max:255'
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
