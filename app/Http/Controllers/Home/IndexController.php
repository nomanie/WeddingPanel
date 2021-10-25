<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\UserFormSubmitRequest;
use App\Models\Wedding;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Str;

class IndexController extends Controller
{


    public function post(UserFormSubmitRequest $request)
    {

        $input = $request->all();
        $message = new MessageBag();
        unset($input['_token']);
        $wedding = Wedding::create($input);
        $wedding->generateToken();
        $message->add('success', "Pomyślnie wysłano formularz!");
        $wedding->notificationUsers();
        $wedding->notificationAdmins();
        return $message->jsonSerialize();
    }


}
