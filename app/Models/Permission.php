<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name','group'];
    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }
    public function group()
    {
        return $this->belongsToMany(Group::class)->select('name');
    }
}
