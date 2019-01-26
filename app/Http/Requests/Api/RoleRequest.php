<?php

namespace App\Http\Requests\Api;

class RoleRequest extends ApiRequest
{
    /**
     * Get data to be validated from the request.
     *
     * @return array
     */
    public function requestAttributes()
    {
        $attributes = [
            'name'=>$this->input('name'),
            'description'=>$this->input('description')
        ];

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
            'description' => 'max:600'
        ];

        if($this->isMethod('PUT')){
            $rules += ['name' => 'required|max:255|unique:roles,name,' . $this->route('role')->id];
        }

        if($this->isMethod('POST')){
            $rules += ['name' => 'required|max:255|unique:roles,name'];
        }

        return $rules;
    }
}
