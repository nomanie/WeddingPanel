<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminUserViewRequest;
use App\Http\Requests\AdminWeddingViewRequest;
use App\Http\Requests\AdminUserDestroyRequest;
use App\Http\Requests\AdminUserStoreRequest;
use App\Http\Requests\AdminUserUpdateRequest;
use App\Http\Requests\AdminWeddingSendToArchive;
use App\Models\User;
use App\Models\Wedding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
use Yajra\DataTables\DataTables;

class WeddingsController extends Controller
{


    public function store(AdminUserStoreRequest $request)
    {
        $input = $request->all();
        $message = new MessageBag();
        $message->add('success', 'Pomyślnie utworzono wesele!');
        User::create(['name' => $input['name'], 'email' => $input['email'], 'password' => bcrypt($input['password']), 'group_id' => $input['group']]);
        return $message->jsonSerialize();
    }

    public function getData(AdminWeddingViewRequest $request)
    {
        if (Auth::user()->group()->first()->id == 3)
            return DataTables::of(Wedding::with('employees')
                ->where('is_archived', 0)
                ->where('operator', null)
                ->where('dj', null)
                ->where('photo', null)
                ->select('id', 'party_date', 'wedding_address', 'dj', 'photo', 'operator', 'services_music', 'services_photo', 'services_video')
                ->get())
                ->editColumn('operator', '@if($services_video) Tak @else Nie @endif')
                ->editColumn('dj', '@if(@services_music) Tak @else Nie @endif')
                ->editColumn('photo', '@if($services_photo) Tak @else Nie @endif')
                ->make(true);
        else {
            return DataTables::of(Wedding::with('employees')
                ->orWhere(function ($query) {
                    $query->where('dj', Auth::user()->id)
                        ->where('is_archived', 0);
                })
                ->orWhere(function ($query) {
                    $query->where('photo', Auth::user()->id)
                        ->where('is_archived', 0);
                })
                ->orWhere(function ($query) {
                    $query->where('operator', Auth::user()->id)
                        ->where('is_archived', 0);
                })
                ->select('id', 'groom_first_name', 'groom_last_name', 'groom_phone_number', 'bride_phone_number', 'bride_first_name', 'bride_last_name', 'wedding_date')
                ->get())
                ->make(true);
        }
    }

    public function showData($id, $request)
    {
        return Wedding::findorfail($id);

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
        if ($wedding = Wedding::find($id)) {
            $input = $request->all();
            unset($input['_token']);
            if ($input['dj']) $input['dj'] = User::where('name', $input['dj'])->select('id')->first()->id;
            if ($input['operator']) $input['operator'] = User::where('name', $input['operator'])->select('id')->first()->id;
            if ($input['operator_2']) $input['operator_2'] = User::where('name', $input['operator_2'])->select('id')->first()->id;
            if ($input['photo']) $input['photo'] = User::where('name', $input['photo'])->select('id')->first()->id;
            if ($input['montage']) $input['montage'] = User::where('name', $input['montage'])->select('id')->first()->id;
            $wedding->update($input);
            $wedding->sendNotifications();
            $message->add('success', 'Pomyślnie edytowano formularz!');


        } else {
            $message->add('error', 'Taki formularz nie istnieje!');
        }
        return $message->jsonSerialize();
    }

    // archiwum
    public function archiveGetData(AdminWeddingViewRequest $request)
    {
        if (Auth::user()->group()->first()->id == 3)

            return DataTables::of(Wedding::select('id', 'groom_first_name', 'bride_first_name', 'bride_phone_number', 'groom_phone_number', 'party_date')->withCount('emails')->where('is_archived', 1)->get())->make(true);
        else {
            //return DataTables::of(Wedding::with('employees')->where('dj', Auth::user()->id)->where('photo', Auth::user()->id)->where('operator', Auth::user()->id)->select('id','groom_first_name','groom_last_name','groom_phone_number','bride_phone_number','bride_first_name','bride_last_name','wedding_date')->get())->make(true);
            return DataTables::of(Wedding::with('employees')
                ->orWhere(function ($query) {
                    $query->where('dj', Auth::user()->id)
                        ->where('is_archived', 1);
                })
                ->orWhere(function ($query) {
                    $query->where('photo', Auth::user()->id)
                        ->where('is_archived', 1);
                })
                ->orWhere(function ($query) {
                    $query->where('operator', Auth::user()->id)
                        ->where('is_archived', 1);
                })
                ->select('id', 'groom_first_name', 'groom_last_name', 'groom_phone_number', 'bride_phone_number', 'bride_first_name', 'bride_last_name', 'wedding_date')
                ->get())
                ->make(true);
        }
    }

    public function archive($id, AdminWeddingSendToArchive $request)
    {
        $message = new MessageBag();
        if ($wedding = Wedding::find($id)) {
            $input = $request->all();
            $wedding->update(["is_archived" => $input['is_archived']]);
            $message->add('success', 'Pomyślnie edytowano formularz!');

        } else {
            $message->add('error', 'Taki formularz nie istnieje!');
        }
        return $message->jsonSerialize();
    }

    public function getAssignedData(AdminWeddingViewRequest $request)
    {
        return DataTables::of(Wedding::with('dj', 'photo', 'operator', 'operator_2', 'montage')
            ->orWhere(function ($query) {
                $query->whereNotNull('dj')
                    ->where('is_archived', 0);
            })
            ->orWhere(function ($query) {
                $query->whereNotNull('photo')
                    ->where('is_archived', 0);
            })
            ->orWhere(function ($query) {
                $query->whereNotNull('operator')
                    ->where('is_archived', 0);
            })
            ->select('id', 'groom_first_name', 'groom_last_name', 'groom_phone_number', 'bride_phone_number', 'bride_first_name', 'bride_last_name', 'party_date', 'dj', 'operator', 'photo', 'operator_2', 'montage')
            ->get())
            ->make(true);
    }


}
