<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminPermissionViewRequest;
use App\Http\Requests\AdminPermissionDestroyRequest;
use App\Http\Requests\AdminPermissionUpdateRequest;
use App\Models\Permission;
use Illuminate\Support\MessageBag;
use Yajra\DataTables\DataTables;

class PermissionsController extends Controller
{

    public function getData(AdminPermissionViewRequest $request)
    {
        return DataTables::of(Permission::with('group')->get())->make(true);

    }

    public function store(AdminPermissionViewRequest $request)
    {
        $input = $request->all();
        $message = new MessageBag();
        Permission::create(['name' => $input['name']]);
        $message->add('success', 'Pomyślnie dodano permisję!');
        return $message->jsonSerialize();

    }

    public function create(AdminPermissionViewRequest $request)
    {
        $input = $request->all();
        $message = new MessageBag();
        Permission::create(['name' => $input['name']]);
        $message->add('success', 'Pomyślnie dodano permisję!');
        return $message->jsonSerialize();
    }

    public function update($id, AdminPermissionUpdateRequest $request)
    {
        $input = $request->all();
        $message = new MessageBag();
        if ($permission = Permission::find($id)) {
            if (!key_exists('group', $input)) {
                $permission->group()->detach();
                $message->add('success', 'Pomyślnie odłączono permisję od grup');
            } else {
                if ($permission->group()->sync($input['group']))
                    $message->add('success', 'Pomyślnie przypisano permisję do grup');
            }
        } else $message->add('error', 'Taka grupa nie istnieje!');
        return $message->jsonSerialize();
    }

    public function destroy($id, AdminPermissionDestroyRequest $request)
    {

    }
}
