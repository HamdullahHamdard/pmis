<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Department;
use App\Models\Employee;
use App\Models\EmployeeType;
use App\Models\EmployeeShift;
use App\Models\Item;
use App\Models\Province;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //     $this->middleware("permission:view-employees");
    //     $this->middleware("permission:create-employees", [
    //         "only" => ["create", "store"],
    //     ]);
    //     $this->middleware("permission:edit-employees", [
    //         "only" => ["edit", "update"],
    //     ]);
    //     $this->middleware("permission:delete-employees", [
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
        $employees_query = Employee::query();

        $searchParam = $request->query("q");

        if ($searchParam) {
            $employees_query = $employees_query->where(function ($query) use (
                $searchParam
            ) {
                $query
                    ->orWhere("name", "like", "%$searchParam%")
                    ->orWhere("position", "like", "%$searchParam%")
                    ->orWhere("employment_id", "like", "%$searchParam%");
                    // ->orWhere("department_id", "like", "%$searchParam%");
            });
        }

        $employees ;
        if(auth()->user()->province_id == 13){
            $employees = $employees_query->orderBy("id", "DESC")->paginate(20);

        }else{
            $employees = $employees_query->orderBy("id", "DESC")->where('province_id', '=', auth()->user()->province_id)->paginate(20);
        }


        $employeeTypes = EmployeeType::all();
        $provinces = Province::all();

        return view(
            "employees.index",
            compact("employees", "searchParam", "employeeTypes", "provinces")
        )->with("i", ($request->input("page", 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employeeTypes = EmployeeType::all();
        $employeeShifts = EmployeeShift::all();
        $provinces = Province::all();
        $items = Item::all();

        return view(
            "employees.create",
            compact("employeeTypes", "employeeShifts", "provinces", "items")
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEmployeeRequest $request)
    {
        Employee::create([
            "name" => $request->name,
            "employment_id" => $request->employment_id,
            "position" => $request->position,
            "employee_type_id" => $request->input("employeeType"),
            "employee_shift_id" => $request->input("employeeShift"),
            "province_id" => auth()->user()->province_id,
            "contact" => $request->contact,
        ]);

        Alert::success("نوۍ کارکونکي په بریالیتوب سره اضافه شو");

        return redirect("employees");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        $employeeTypes = EmployeeType::all();
        $employeeShifts = EmployeeShift::all();
        $provinces = Province::all();
        $empProvince = $employee->province_id;
        $submissions = Submission::where("employee_id", $employee->id)->get();
        $items = Item::all();

        return view(
            "employees.show",
            compact(
                "employee",
                "employeeTypes",
                "employeeShifts",
                "provinces",
                "empProvince",
                "submissions",
                "items"
            )
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        $employeeTypes = EmployeeType::all();
        $empType = $employee->employee_type_id;
        $employeeShifts = EmployeeShift::all();
        $empShift = $employee->employee_shift_id;
        $provinces = Province::all();
        $empProvince = $employee->province_id;

        return view(
            "employees.edit",
            compact(
                "employee",
                "employeeTypes",
                "empType",
                "employeeShifts",
                "empShift",
                "provinces",
                "empProvince"
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, $id)
    {
        $employee = Employee::find($id);
        $employee->name = $request->name;
        $employee->employment_id = $request->input("employment_id");
        $employee->position = $request->position;
        $employee->employee_type_id = $request->input("employeeType");
        $employee->employee_shift_id = $request->input("employeeShift");
        $employee->province_id = auth()->user()->province_id;
        $employee->contact = $request->input("contact");

        $employee->save();

        Alert::success("د کارونکي معلومات په بریالیتوب سره سم شول");

        return redirect("employees");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::find($id)->delete();
        Alert::success("کارکونکي په بریالیتوب سره له منځه یوړل شو");

        return redirect("employees");
    }
}
