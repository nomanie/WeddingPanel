<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AdminUserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->hasPermission('admin.user')?true:false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'password'=>'confirmed|min:6|max:32|required',
        'name'=>'string|min:3|max:32|required|unique:users',
        'email'=>'email|min:3|max:32|required|unique:users',
        'group'=>'int|required'
    ];
    }
}
