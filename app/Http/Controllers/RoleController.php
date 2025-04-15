<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //     $this->middleware(
    //         "permission:view-roles|create-roles|edit-roles|delete-roles",
    //         ["only" => ["index", "store"]]
    //     );
    //     $this->middleware("permission:create-roles", [
    //         "only" => ["create", "store"],
    //     ]);
    //     $this->middleware("permission:edit-roles", [
    //         "only" => ["edit", "update"],
    //     ]);
    //     $this->middleware("permission:delete-roles", ["only" => ["destroy"]]);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Role::orderBy("id", "ASC")->paginate(10);
        return view("roles.index", compact("roles"))->with(
            "i",
            ($request->input("page", 1) - 1) * 10
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::get();
        return view("roles.create", compact("permissions"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "permissions" => "required|array",
            "permissions.*" => "exists:permissions,id", // Ensure each permission ID exists
        ]);
        $role = Role::create(["name" => $request->input("name")]);

        // Convert permission IDs to names before syncing
        $permissions = Permission::whereIn('id', $request->permissions)->pluck('name')->toArray();

        $role->syncPermissions($permissions);

        Alert::success("نوۍ صلاحیت په بریالیتوب سره جوړ شو");

        return redirect("roles");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join(
            "role_has_permissions",
            "role_has_permissions.permission_id",
            "=",
            "permissions.id"
        )
            ->where("role_has_permissions.role_id", $id)
            ->get();

        return view("roles.show", compact("role", "rolePermissions"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")
            ->where("role_has_permissions.role_id", $id)
            ->pluck(
                "role_has_permissions.permission_id",
                "role_has_permissions.permission_id"
            )
            ->all();

        return view(
            "roles.edit",
            compact("role", "permissions", "rolePermissions")
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "permissions" => "required|array", // Ensure it's an array
            "permissions.*" => "exists:permissions,id", // Validate each permission exists
        ]);

        $role = Role::findOrFail($id);
        $role->name = $request->input("name");
        $role->save();

        // Convert permission IDs to names before syncing (if IDs are sent)
        $permissions = Permission::whereIn('id', $request->input("permissions"))->pluck('name')->toArray();

        $role->syncPermissions($permissions);


        Alert::success("صلاحیت په بریالیتوب سره سم شو");

        return redirect("roles");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("roles")
            ->where("id", $id)
            ->delete();

        Alert::success("صلاحیت په بریالیتوب سره له منځه یوړل شو");

        return redirect("roles");
    }
}
