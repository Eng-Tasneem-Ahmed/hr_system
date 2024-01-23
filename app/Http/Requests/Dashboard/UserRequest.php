<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $role=[
            "name"=>"required|max:255",
            "password"=>"required|max:255",
            "username"=>"required|unique:users,username,".$this->id,
            "email"=>"nullable|email|unique:users,email,".$this->id,
            "branch_id"=>"required|exists:branches,id",
            "department_id"=>"required|exists:departments,id",
            "address"=>"required|max:255",
            "photo"=>"sometimes|image|mimes:png,jpg,jpeg,webp",
            "front_id_card_photo"=>"required|image|mimes:png,jpg,jpeg,webp",
            "back_id_card_photo"=>"required|image|mimes:png,jpg,jpeg,webp",
            'phone'=>'required|regex:/^01[0125][0-9]{8}$/|unique:users,phone,'.$this->id,

        ];
        // if($this->method()=="PUT"||$this->method()=="PATCH"){
        //     $role=
        // }
        return  $role;
    }
}
