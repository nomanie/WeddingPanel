<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminSettingsStoreRequest;
use App\Models\Setting;
use Illuminate\Support\MessageBag;

class SettingsController extends Controller
{

    public function store(AdminSettingsStoreRequest $request)
    {
        $input = $request->all();
        $message = new MessageBag();
        unset($input['_token']);
        foreach (array_keys($input) as $key) {
            if ($item = Setting::where('name', $key)->first()) $item->update(['value' => $input[$key]]);
            else Setting::create(['name' => $key, 'value' => $input[$key]]);
        }
        $message->add('success', "Pomyślnie edytowano ustawienia!");
        return $message->jsonSerialize();
    }
}
