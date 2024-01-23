<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
        $role=[ "name"=>"required|max:255|unique:departments,name"];
        if($this->method()=="PUT"||$this->method()=="PATCH"){
            $role['name']="required|max:255|unique:departments,name,".$this->department->id;
        }
        return $role;
    }
}
