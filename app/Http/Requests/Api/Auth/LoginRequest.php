<?php

namespace App\Http\Requests\Api\Auth;

use App\Http\Requests\Api\BaseFormRequest;
class LoginRequest extends BaseFormRequest
{
    
    public function rules(): array
    {
        return [
            'username' => 'required|string',
            'password' => 'required|string',
        ];
    }
}
