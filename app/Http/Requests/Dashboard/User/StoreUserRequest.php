<?php

namespace App\Http\Requests\Dashboard\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name"=>"required|max:255",
            "salary"=>"required|numeric",
            "password"=>"required|max:255",
            "username"=>"required|unique:users,username",
            "email"=>"nullable|email|unique:users,email",
            "branch_id"=>"required|exists:branches,id",
            "department_id"=>"required|exists:departments,id",
            "photo"=>"sometimes|mimes:png,jpg,jpeg,webp",
            "front_id_card_photo"=>'required|mimes:png,jpg,jpeg,webp|max:2048',
            "back_id_card_photo"=>'required|mimes:png,jpg,jpeg,webp|max:2048',
            'phone'=>'required|regex:/^01[0125][0-9]{8}$/|unique:users,phone',
        ];
    }
}
