<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;

class Page extends Model
{
    private static $instance, $settings;
    protected $fillable = [
        'name', 'page_file', 'settings'
    ];

    public static function getInstance()
    {
        if (!self::$instance)
            self::$instance = new Page();
        return self::$instance;
    }

    public static function getSettings()
    {
        if (self::$instance->where('name', Route::currentRouteName())->exists()) {
            self::$settings = json_decode(self::$instance->where('name', Route::currentRouteName())->select('settings')->first()->settings, true);
            return self::$instance;
        } else
            return self::$instance;
    }

    public static function name($name)
    {
        if (self::$settings)
            if (array_key_exists($name, self::$settings))
                return self::$settings[$name];
            else
                return null;
        else
            return null;
    }

    public static function getPageFile()
    {
        if (self::$instance->where('name', Route::currentRouteName())->exists()) {
            return self::$instance->where('name', Route::currentRouteName())->select('page_file')->first()->page_file;
        } else
            return null;
    }
}
