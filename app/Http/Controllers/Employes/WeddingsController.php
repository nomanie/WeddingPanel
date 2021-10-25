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
use App\Models\Wedding;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\MessageBag;
use Yajra\DataTables\DataTables;

class WeddingsController extends Controller
{

    public function getData(AdminUserViewRequest $request)
    {
        return DataTables::of(Wedding::with('employees')->where("dj", Auth::user()->id OR "photo", Auth::user()->id OR "operator", Auth::user()->id)->select('id','groom_first_name','groom_last_name','groom_phone_number','bride_phone_number','bride_first_name','bride_last_name','wedding_date')->get())->make(true);
    }

    public function showData($id, $request)
    {
        return Wedding::findorfail($id);

    }


}


