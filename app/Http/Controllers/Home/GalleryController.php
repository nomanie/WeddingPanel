<?php

namespace App\Http\Controllers\Home;

use App\Models\Wedding;
use App\Models\Weddings_email;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class GalleryController extends Controller
{

    public function gallery($token)
    {
        if ($wedding = Wedding::where('token', filter_var($token, FILTER_SANITIZE_STRING))->first()) {
            /*
             * Wyświetlanie galerii.
             */
            return view('home.pages.gallery.gallery')->with('images', $wedding->images()->get());
        }
        /*
         * Token nie istnieje.
         */
        else return abort(404);
    }

    public function form($token, Request $request)
    {
        /*
         * Obsługa formularza pozwalającego zapisać się do powiadomień gdy galeria zostanie dodana.
         */

        if ($wedding = Wedding::where('token', filter_var($token, FILTER_SANITIZE_STRING))->first()) {
            $validated = $request->validate([
                'email' => 'required|email|max:32'
            ]);
            $message = new MessageBag();
            Weddings_email::create(['wedding' => $wedding->id, 'email' => $validated['email']]);
            $message->add('success', "Pomyślnie zapisano się do powiadomień!");
            return $message->jsonSerialize();
        } else {
            return abort(404);
        }

    }
}
