<?php

namespace Vanguard\Http\Requests\Auth;

class ApiVerifyEmailRequest extends LoginRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required',
            'hash' => 'required',
            'expires' => 'required',
            'signature' => 'required',
        ];
    }
}
