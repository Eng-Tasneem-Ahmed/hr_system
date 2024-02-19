<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

  
    public function rules(): array
    {
        $role=[ "name"=>"required|max:255|unique:departments,name"];
        if($this->method()=="PUT"||$this->method()=="PATCH"){
            $role['name']="required|max:255|unique:departments,name,".$this->department->id;
        }
        return $role;
    }
}
