<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Home\UserController;
use App\Http\Requests\AdminUserViewRequest;
use App\Http\Requests\AdminUserDestroyRequest;
use App\Http\Requests\AdminUserStoreRequest;
use App\Http\Requests\AdminUserUpdateRequest;
use App\Models\Page;
use App\Models\User;
use App\Models\Group;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\MessageBag;
use Yajra\DataTables\DataTables;

class UsersController extends Controller
{


    public function store(AdminUserStoreRequest $request)
    {
        $input = $request->all();
        $message = new MessageBag();
        $message->add('success', 'Pomyślnie utworzono użytkownika!');
        User::create(['name' => $input['name'], 'email' => $input['email'], 'password' => bcrypt($input['password']), 'group_id' => $input['group']]);
        return $message->jsonSerialize();
    }

    public function getData(AdminUserViewRequest $request)
    {

        return DataTables::of(User::with('group')->get())->make(true);
    }

    public function showData($id, $request)
    {
        return User::with('group')->findorfail($id);

    }

    public function create(AdminUserViewRequest $request)
    {
        $input = $request->all();
        $message = new MessageBag();
        $message->add('success', 'Pomyślnie utworzono użytkownika!');
        User::create(['name' => $input['name'], 'email' => $input['email'], 'password' => bcrypt($input['password']), 'group_id' => $input['group']]);
        return $message->jsonSerialize();
    }

    public function update($id, AdminUserUpdateRequest $request)
    {
        $message = new MessageBag();
        if ($user = User::find($id)) {
            $input = $request->all();
            if (!empty($input['password'])) {
                //$input['password']->validate(['password' => 'password|between:8,20']);
                $user->update(['password' => bcrypt($input['password'])]);
            }
            $user->update(['name' => $input['name'], 'email' => $input['email'], 'group_id' => $input['group']]);
            $message->add('success', 'Pomyślnie edytowano użytkownika!');

        } else {
            $message->add('error', 'Taki użytkownik nie istnieje!');
        }
        return $message->jsonSerialize();
    }


    public function destroy($id, AdminUserDestroyRequest $request)
    {
        $message = new MessageBag();
        $input = $request->all();
        if ($user = User::find($id)) {
            $user->delete();
            $message->add('success', 'Pomyślnie usunięto użytkownika!');
        } else $message->add('error', 'Taki użytkownik nie istnieje!');
        return $message->jsonSerialize();
    }
}
