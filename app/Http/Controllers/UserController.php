<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //     $this->middleware("permission:view-users");
    //     $this->middleware("permission:create-users", [
    //         "only" => ["create", "store"],
    //     ]);
    //     $this->middleware("permission:edit-users", [
    //         "only" => ["edit", "update"],
    //     ]);
    //     $this->middleware("permission:delete-users", ["only" => ["destroy"]]);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users_query = User::query();

        $searchParam = $request->query("q");

        if ($searchParam) {
            $users_query = $users_query->where(function ($query) use (
                $searchParam
            ) {
                $query
                    ->orWhere("name", "like", "%$searchParam%")
                    ->orWhere("email", "like", "%$searchParam%");
            });
        }

        $users = $users_query->paginate(10);
        $provinces = Province::all();

        return view("users.index", compact("users", "searchParam", "provinces"))->with(
            "i",
            ($request->input("page", 1) - 1) * 5
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $provinces = Province::all();
        return view("users.create", compact("roles", "provinces"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "province_id" => $request->input("province")
        ]);

        $user->assignRole($request->input("roles"));

        Alert::success("نوۍ کارونکي په بریالیتوب سره جوړ شو");

        return redirect("users");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view("users.show", compact("user"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $userRole = $user->roles->all();
        $provinces = Province::all();

        return view("users.edit", compact("user", "roles", "userRole", "provinces"));
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
        $this->validate($request, [
            "name" => "required",
            "email" => "required|email|unique:users,email," . $id,
            "password" => "required|same:confirm-password",
            "roles" => "required",
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->province_id = $request->input("province");

        if (
            $request->input("password") &&
            $request->input("confirm-password")
        ) {
            if (
                $request->input("password") ===
                $request->input("confirm-password")
            ) {
                $user->password = Hash::make($request->password);
            }
        }

        $user->save();

        DB::table("model_has_roles")
            ->where("model_id", $id)
            ->delete();

        $user->assignRole($request->roles);

        Alert::success("د کارونکي معلومات په بریالیتوب سره سم شول");

        return redirect("users");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        Alert::success("کارونکي په بریالیتوب سره له منځه یوړل شو");

        return redirect("users");
    }
}
