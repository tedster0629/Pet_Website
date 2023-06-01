<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'fname'=>'string|max:255',
            'lname'=>'string|max:255',
            'phone'=>'numeric|digits:10',
            'street'=>'string|max:255',
            'city'=>'string|max:255',
            'province'=>'string|max:255',
            'postal_code'=>'string',
        ];
    }
}
