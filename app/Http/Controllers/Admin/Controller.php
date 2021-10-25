<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Route;
use phpDocumentor\Reflection\Types\Parent_;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function index()
    {
        $name = substr(Route::currentRouteName(), strpos(Route::currentRouteName(), '.') + 1);
        $settings = Page::getInstance()->getSettings();
        if (substr_count($name, '.') >= 2) {
            $name = substr($name, 0, strrpos($name, '.'));

            if (!request()->ajax()) $view = view("admin.pages.${name}")->with('settings', $settings);
            else $view = view("admin.components.${name}")->with('settings', $settings);

        } else {
            if (strpos($name, '.') !== false) $name = substr($name, 0, strpos($name, '.'));
            if (!request()->ajax()) $view = view("admin.pages.${name}.${name}")->with('settings', $settings);
            else $view = view("admin.components.${name}.${name}")->with('settings', $settings);
        }
        $this->generateEmployees($view);
        return $view;
    }

    public function show($id, Request $request)
    {

        $string = get_class($this);
        $class = new $string();
        $name = substr(Route::currentRouteName(), strpos(Route::currentRouteName(), '.') + 1);
        $settings = Page::getInstance()->getSettings();
        if (substr_count($name, '.') >= 2) $name = substr($name, 0, strrpos($name, '.'));
        $view = (request()->ajax() ? view("admin.components.${name}") : view("admin.pages.${name}"));
        if (method_exists($class, 'showData')) $view->with('data', $class->showData($id, $request));
        $view->with('settings', $settings);
        $view->with('id', $id);
        $this->generateEmployees($view);

        return $view;
    }

    public function generateEmployees($view)
    {
        /*
         * Generowanie listy dj'ów
         */
        if (\App\Models\Group::with('users')->where('name', "D-J")->count()) {
            $dj_list = \App\Models\Group::with('users')->where('name', "D-J")->first()->users->pluck('name', 'name')->toArray();
            $view->with('dj', $dj_list);
        } else $view->with('dj', ['null' => 'Wybierz pracownika']);

        /*
         * Generowanie listy fotografów
         */
        if (\App\Models\Group::with('users')->where('name', "Fotograf")->count()) {
            $photo_list = \App\Models\Group::with('users')->where('name', "Fotograf")->first()->users->pluck('name', 'name')->toArray();
            $view->with('photo', $photo_list);
        } else  $view->with('photo', ['null' => 'Wybierz pracownika']);

        /*
         * Generowanie listy operatorów
         */

        if (\App\Models\Group::with('users')->where('name', "Operator")->count()) {
            $operator_list = \App\Models\Group::with('users')->where('name', "Operator")->first()->users->pluck('name', 'name')->toArray();
            $view->with('operator', $operator_list);
            $view->with('operator_2', $operator_list);
        } else {
            $view->with('operator', ['null' => 'Wybierz pracownika']);
            $view->with('operator_2', ['null' => 'Wybierz pracownika']);
        }

        if (\App\Models\Group::with('users')->where('name', "Montażysta")->count()) {
            $operator_list = \App\Models\Group::with('users')->where('name', "Montażysta")->first()->users->pluck('name', 'name')->toArray();
            $view->with('montage', $operator_list);
        } else  $view->with('montage', ['null' => 'Wybierz pracownika']);

        return $view;
    }
}
