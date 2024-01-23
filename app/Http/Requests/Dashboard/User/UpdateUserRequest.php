<?php

namespace App\Http\Requests\Dashboard\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

   
    public function rules(): array
    {
        return [
            "name"=>"required|max:255",
            "username"=>"required|unique:users,username,".$this->user->id,
            "email"=>"nullable|email|unique:users,email,".$this->user->id,
            "branch_id"=>"required|exists:branches,id",
            "department_id"=>"required|exists:departments,id",
            'phone'=>'required|regex:/^01[0125][0-9]{8}$/|unique:users,phone,'.$this->user->id,
            "photo"=>"sometimes|mimes:png,jpg,jpeg,webp",
            "front_id_card_photo"=>'sometimes|mimes:png,jpg,jpeg,webp|max:2048',
            "back_id_card_photo"=>'sometimes|mimes:png,jpg,jpeg,webp|max:2048',
            "salary"=>"required|numeric",

        ];
    }
}
