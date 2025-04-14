<?php

namespace App\Http\Controllers;

use App\Models\EmployeeType;
use App\Http\Requests\StoreEmployeeTypeRequest;
use App\Http\Requests\UpdateEmployeeTypeRequest;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class EmployeeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //     $this->middleware(
    //         "permission:view-employeeTypes|create-employeeTypes|edit-employeeTypes|delete-employeeTypes",
    //         ["only" => ["index", "store"]]
    //     );
    //     $this->middleware("permission:create-employeeTypes", [
    //         "only" => ["create", "store"],
    //     ]);
    //     $this->middleware("permission:edit-employeeTypes", [
    //         "only" => ["edit", "update"],
    //     ]);
    //     $this->middleware("permission:delete-employeeTypes", [
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
        $types = EmployeeType::orderBy("id", "ASC")->paginate(10);
        return view("employeeTypes.index", compact("types"))->with(
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
        return view("employeeTypes.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        EmployeeType::create(["name" => $request->input("name")]);

        Alert::success("نوعیت وظیفه جدید موفقانه اضافه گردید");

        return redirect("employee/types");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeeType  $employeeType
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employeeType = EmployeeType::find($id);
        return view("employeeTypes.show", compact("employeeType"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeeType  $employeeType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employeeType = EmployeeType::find($id);

        return view("employeeTypes.edit", compact("employeeType"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeTypeRequest  $request
     * @param  \App\Models\EmployeeType  $employeeType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employeeType = EmployeeType::find($id);
        $employeeType->name = $request->name;

        $employeeType->save();

        Alert::success("معلومات نوعیت وظیفه موفقانه تغیر داده شد");

        return redirect("employee/types");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeType  $employeeType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EmployeeType::find($id)->delete();

        Alert::success("نوعیت وظیفه موفقانه از سیستم پاک گردید");

        return redirect("employee/types");
    }
}
