<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDepartmentRequest;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //     $this->middleware("permission:view-departments");
    //     $this->middleware("permission:create-departments", [
    //         "only" => ["create", "store"],
    //     ]);
    //     $this->middleware("permission:edit-departments", [
    //         "only" => ["edit", "update"],
    //     ]);
    //     $this->middleware("permission:delete-departments", [
    //         "only" => ["destroy"],
    //     ]);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $departments = Department::orderBy("id", "ASC")->paginate(10);
        return view("departments.index", compact("departments"))->with(
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
        return view("departments.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDepartmentRequest $request)
    {
        Department::create([
            "name" => $request->name,
        ]);

        Alert::success("نوۍ ریاست / آمریت په بریالیتوب سره جوړ شو");

        return redirect("stock/departments");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department = Department::find($id);
        return view("departments.show", compact("department"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::find($id);

        return view("departments.edit", compact("department"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDepartmentRequest  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //     'name' => 'required',
        // ]);

        $department = Department::find($id);
        $department->name = $request->name;

        $department->save();

        Alert::success("د آمریت / ریاست معلومات په بریالیتوب سره سم شول");

        return redirect("stock/departments");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Department::find($id)->delete();

        Alert::success("آمریت / ریاست په بریالیتوب سره له منځه یوړل شو");

        return redirect("stock/departments");
    }
}
