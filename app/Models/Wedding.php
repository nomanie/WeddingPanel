<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Mail\PdfSender;
use App\Models\Group;
use App\Mail\notificationUsers;
use App\Mail\notificationAdmins;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class Wedding extends Model
{
    protected $fillable = [
        'id',
        'groom_first_name',
        'groom_last_name',
        'groom_birthdate',
        'groom_phone_number',
        'groom_email',
        'bride_first_name',
        'bride_last_name',
        'bride_birthdate',
        'bride_phone_number',
        'bride_email',
        'music_for_first_dance',
        'music_for_first_dance_original',
        'music_for_first_dance_full_length',
        'music_for_first_dance_start',
        'music_for_first_dance_end',
        'thanks_to_parents',
        'thanks_to_partens_description',
        'groom_parents_first_names',
        'bride_parents_first_names',
        'cake_time',
        'meat_time',
        'services_music',
        'services_photo',
        'services_video',
        'our_services_lights',
        'our_services_smoke',
        'our_services_photo_booth',
        'our_services_love_sign',
        'our_services_bartending',
        'our_services_live_instrumental',
        'prepare_date',
        'bride_prepare_address',
        'groom_prepare_address',
        'wedding_date',
        'wedding_address',
        'restaurant_come',
        'party_date',
        'party_address',
        'special_wishes_photo',
        'special_wishes_photo_description',
        'longer_movie',
        'special_wishes_video',
        'special_wishes_video_description',
        'video_own_music_checkbox',
        'video_own_music',
        'own_music',
        'forbidden_music',
        'additional_attractions',
        'wishes',
        'dj',
        'photo',
        'operator',
        'operator_2',
        'montage',
        'is_archived',
        'token',
    ];

    public function images()
    {
        return $this->hasMany(Image::class, 'wedding', 'id');
    }

    public function emails()
    {
        return $this->hasMany('App\Models\Weddings_email', 'wedding', 'id');
    }

    public function employees()
    {
        return $this->belongsToMany(User::class);
    }

    public function dj()
    {
        return $this->hasOne('App\Models\User', 'id', 'dj');
    }

    public function photo()
    {
        return $this->hasOne('App\Models\User', 'id', 'photo');
    }

    public function operator()
    {
        return $this->hasOne('App\Models\User', 'id', 'operator');
    }

    public function operator_2()
    {
        return $this->hasOne('App\Models\User', 'id', 'operator_2');
    }

    public function montage()
    {
        return $this->hasOne('App\Models\User', 'id', 'montage');
    }

    public function sendNotifications()
    {
        if (!is_null($this->dj))
            $this->sendMail($this->dj()->first()->email);
        if (!is_null($this->photo))
            $this->sendMail($this->photo()->first()->email);
        if (!is_null($this->operator))
            $this->sendMail($this->operator()->first()->email);
    }

    public function notificationUsers()
    {
        Mail::to($this->groom_email)->send(new notificationUsers($this));
        Mail::to($this->bride_email)->send(new notificationUsers($this));
    }

    public function notificationAdmins()
    {
        foreach (Group::find(3)->users()->get() as $admin) {
            Mail::to($admin->email)->send(new notificationAdmins($this));
        }
    }

    public function sendMail($email)
    {
        if ($email)
            Mail::to($email)->send(new PdfSender($this));
    }

    public function generateToken()
    {
        $token = Str::random(32);
        if (!Wedding::where('token', $token)->count())
            $this->update(['token' => $token]);
        else
            $this->generateToken();
    }

}





