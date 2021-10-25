<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    const default = 1;
    protected $fillable = [
        'name',
    ];
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
    public function users()
    {
        return $this->hasMany(User::class,'group_id');
    }
}
