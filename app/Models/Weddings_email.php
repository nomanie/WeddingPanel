<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weddings_email extends Model
{
    protected $fillable = ['wedding', 'email'];

    public function wedding()
    {
        $this->hasMany(Wedding::class, 'id', 'wedding');
    }
}
