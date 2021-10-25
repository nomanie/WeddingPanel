<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    protected $fillable = ['wedding', 'path', 'type'];


    public function wedding()
    {
        $this->hasMany(Wedding::class, 'id', 'wedding');
    }
}
