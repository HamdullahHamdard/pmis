<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeShiftRequest;
use App\Http\Requests\UpdateEmployeeShiftRequest;
use App\Models\EmployeeShift;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class EmployeeShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware(
            "permission:view-employeeShifts|create-employeeShifts|edit-employeeShifts|delete-employeeShifts",
            ["only" => ["index", "store"]]
        );
        $this->middleware("permission:create-employeeShifts", [
            "only" => ["create", "store"],
        ]);
        $this->middleware("permission:edit-employeeShifts", [
            "only" => ["edit", "update"],
        ]);
        $this->middleware("permission:delete-employeeShifts", [
            "only" => ["destroy"],
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $shifts = EmployeeShift::orderBy("id", "ASC")->paginate(5);
        return view("employeeShifts.index", compact("shifts"))->with(
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
        return view("employeeShifts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeShiftRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        EmployeeShift::create(["name" => $request->input("name")]);

        Alert::success(" شفت کاری جدید موفقانه اضافه گردید");

        return redirect("employee/shifts");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeeShift  $employeeShift
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employeeShift = EmployeeShift::find($id);
        return view("employeeShifts.show", compact("employeeShift"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeeShift  $employeeShift
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employeeShift = EmployeeShift::find($id);

        return view("employeeShifts.edit", compact("employeeShift"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeShiftRequest  $request
     * @param  \App\Models\EmployeeShift  $employeeShift
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employeeShift = EmployeeShift::find($id);
        $employeeShift->name = $request->name;

        $employeeShift->save();

        Alert::success("معلومات شفت کاری موفقانه تغیر داده شد");

        return redirect("employee/shifts");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeShift  $employeeShift
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EmployeeShift::find($id)->delete();

        Alert::success("شفت کاری موفقانه از سیستم پاک گردید");

        return redirect("employee/shifts");
    }
}
