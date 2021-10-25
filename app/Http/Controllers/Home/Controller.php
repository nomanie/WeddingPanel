<?php

namespace App\Http\Controllers\Home;

use App\Models\Page;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function index()
    {


        $string = get_class($this);
        $class = new $string();
        $settings = Page::getInstance()->getSettings();
        $name = substr(Route::currentRouteName(), strpos(Route::currentRouteName(), '.') + 1);

        if (substr_count($name, '.')) {
            $name = substr($name, 0, strrpos($name, '.'));
        } else {
            if (strpos($name, '.') !== false) $name = substr($name, 0, strpos($name, '.'));
        }
        $name = ((strpos($name, '.') !== false) ? $name . $name : $name);
        $view = (request()->ajax() ? view("home.components.${name}.${name}") : view("home.pages.${name}.${name}"));
        if (method_exists($class, 'indexData')) $view->with('indexData', $class->indexData());
        return $view;
    }

    public function indexForBoth(Request $request)
    {
        $name = substr(Route::currentRouteName(), 0, strpos(Route::currentRouteName(), '.'));
        $master = (Auth::user()) ? "home.master" : "app";
        $view = ($request->ajax()) ? "home.components.$name.$name" : "home.pages.$name.$name";
        return view($view)->with('master', $master);

    }

    public function show($id, Request $request)
    {

        $string = get_class($this);
        $class = new $string();
        $name = substr(Route::currentRouteName(), strpos(Route::currentRouteName(), '.') + 1);
        $settings = Page::getInstance()->getSettings();
        if (substr_count($name, '.') >= 2) $name = substr($name, 0, strrpos($name, '.'));
        $view = (request()->ajax() ? view("home.components.${name}") : view("home.pages.${name}"));
        if (method_exists($class, 'showData')) $view->with('data', $class->showData($id, $request));
        $view->with('settings', $settings);
        return $view;
    }
}
