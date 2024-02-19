<?php

namespace App\Http\Requests\Dashboard\Role;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "name"          => "required|string|unique:roles,name,".$this->role->id,
            "permissions.*" => "required|exists:permissions,name"
        ];
    }
}
