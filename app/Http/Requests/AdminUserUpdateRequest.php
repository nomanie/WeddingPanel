<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AdminUserUpdateRequest extends FormRequest
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
            'name' => 'between:5,30|string',
            'email' => 'email',
            'group_id' => 'integer|min:1',
            'experience_points' => 'integer|min:0',
            'experience_level' => 'integer|min:1',
            'experience' => 'integer|min:0',
            'health_points' => 'integer|min:0',
            'energy_points' => 'integer|min:0',
            'strength_points' => 'integer|min:1',
            'dexterity_points' => 'integer|min:1',
            'vitality_points' => 'integer|min:1|',
            'intelligence_points' => 'integer|min:1',
            'cleanliness_level' => 'integer|min:0',
            'crime_level' => 'integer|min:0',
            'city_id' => 'integer|min:1',
            'alive' => 'integer|min:0|max:1',
            'description' => 'string',
            'balance' => 'integer|min:0',
            'premium_balance' => 'integer|min:0',
        ];
    }
}
