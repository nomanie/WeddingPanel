<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AdminWeddingStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return Auth::user()->hasPermission('admin.wedding') ? true : false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      /*  return [
            "groom_first_name"=>"required|string|max:64",
            "groom_last_name"=>"required|string|max:64",
            "groom_birthdate"=>"required|date",
            "groom_phone_number"=>"required|integer",
            "groom_email"=>"required|email",
            "bride_first_name"=>"required|string|max:64",
            "bride_last_name"=>"required|string|max:64",
            "bride_birthdate"=>"required|date",
            "bride_phone_number"=>"required|integer",
            "bride_email"=>"required|email",
            "music_for_first_dance"=>"nullable|string",
            "music_for_first_dance_original"=>"nullable",
            "music_for_first_dance_full_length"=>"nullable",
            "music_for_first_dance_start"=>"nullable|string|max:12",
            "music_for_first_dance_end"=>"nullable|string|max:12",
            "thanks_to_parents"=>"nullable",
            "thanks_to_partens_description"=>"nullable|string",
            "groom_parents_first_names"=>"nullable|string|max:64",
            "bride_parents_first_names"=>"nullable|string|max:64",
            "cake_time"=>"string|max:12",
            "meat_time"=>"string|max:12",
            "services_music"=>"nullable",
            "services_photo"=>"nullable",
            "services_video"=>"nullable",
            "our_services_lights"=>"nullable",
            "our_services_smoke"=>"nullable",
            "our_services_photo_booth"=>"nullable",
            "our_services_love_sign"=>"nullable",
            "our_services_bartending"=>"nullable",
            "our_services_live_instrumental"=>"nullable",
            "prepare_date"=>"required|date|after:today",
            "prepare_address"=>"nullable|string",
            "wedding_date"=>"required|date|after:today",
            "wedding_address"=>"nullable|string",
            "party_date"=>"required|date|after:today",
            "party_address"=>"nullable|string",
            "own_music"=>"nullable|string",
            "forbidden_music"=>"nullable|string",
            "additional_attractions"=>"nullable|string",
            "wishes"=>"nullable|string",
            "dj"=>"nullable|integer|exists:users,id",
            "photo"=>"nullable|integer|exists:users,id"
        ];*/
    }
}
