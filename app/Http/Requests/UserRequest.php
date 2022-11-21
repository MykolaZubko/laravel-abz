<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;


class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:60|min:2',
            'email' => 'email:rfc,dns|min:2|max:100|unique:App\Models\User,email',
            'phone' => 'required|regex:^[\+]{0,1}380([0-9]{9})$^|unique:App\Models\User,phone',
            'position_id' => 'required',
            'photo' => 'required',
        ];
    }
}
