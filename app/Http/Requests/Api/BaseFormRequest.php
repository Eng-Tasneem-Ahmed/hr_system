<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class BaseFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

   
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(responseErrorMessage($validator->errors()));
    }


}