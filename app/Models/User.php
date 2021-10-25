<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'group_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /*
     * Function for getting notifications from user
     */
    public function getNotifications()
    {
        return $this->hasMany("App\Models\Group", 'user_id');
    }

    public function weddings()
    {
        return $this->belongsToMany(Wedding::class);
    }
    public function group()
    {
        return $this->hasOne('App\Models\Group', 'id', 'group_id');
    }

    public function post()
    {
        return $this->hasMany(Post::class, 'author_id');
    }

    public function permissions()
    {
        if (Auth::guest()) return false;
        else {
            return $this->hasOne('App\Models\Group', 'id', 'group_id')->first()->permissions();
        }
    }

    public function hasPermission($permission)
    {
        if ($this->permissions()->where('name', $permission)->first() || $this->group()->first()->permissions()->where('name', '*')->first()) {
            return true;
        }
        return false;
    }

    public function hasAnyPermission($permissions)
    {
        if (is_array($permissions)) {
            foreach ($permissions as $permission) {

                if ($this->hasPermission($permission)) {
                    return true;
                }
            }
        } else {
            if ($this->hasPermission($permissions)) {
                return true;
            }
        }
        return false;
    }

}
