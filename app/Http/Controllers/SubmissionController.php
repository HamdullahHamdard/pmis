<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use App\Http\Requests\StoreSubmissionRequest;
use App\Http\Requests\UpdateSubmissionRequest;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Item;
use App\Models\Province;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware("permission:view-submission");
        $this->middleware("permission:create-submission", [
            "only" => ["create", "store"],
        ]);
        $this->middleware("permission:edit-submission", [
            "only" => ["edit", "update"],
        ]);
        $this->middleware("permission:delete-submission", [
            "only" => ["destroy"],
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $submissions = Submission::orderBy("id", "DESC")->paginate(20);
        $employees = Employee::all();
        $departments = Department::all();
        $items = Item::all();
        $provinces = Province::all();

        return view(
            "submission.index",
            compact("submissions", "employees", "departments", "items", "provinces")
        )->with("i", ($request->input("page", 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::all();
        $departments = Department::all();
        $items = Item::all();
        $provinces = Province::all();

        return view(
            "submission.create",
            compact("employees", "departments", "items", "provinces")
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubmissionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubmissionRequest $request)
    {
        Submission::create([
            "employee_id" => $request->input("employeeName"),
            "item_id" => $request->item,
            "total" => $request->total,
            "details" => $request->input("details"),
            "province_id" => $request->input("province"),
            "is_returned" => $request->status,
        ]);

        Alert::success("نوۍ تسلیمي په بریالیتوب سره اضافه شوه");

        return redirect("stock/submission");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $submission = Submission::find($id);
        $employees = Employee::all();
        $departments = Department::all();
        $items = Item::all();
        $provinces = Province::all();

        return view(
            "submission.show",
            compact("submission", "employees", "departments", "items", "provinces")
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $submission = Submission::find($id);
        $employees = Employee::all();
        $departments = Department::all();
        $items = Item::all();
        $provinces = Province::all();

        return view(
            "submission.edit",
            compact("submission", "employees", "departments", "items", "provinces")
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubmissionRequest  $request
     * @param  \App\Models\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubmissionRequest $request, $id)
    {
        $submission = Submission::find($id);
        $submission->employee_id = $request->input("empSubmission");
        $submission->item_id = $request->item;
        $submission->total = $request->total;
        $submission->details = $request->input("details");
        $submission->province_id = $request->input("province");
        $submission->is_returned = $request->status;

        $submission->update();

        Alert::success("د تسلیمي معلومات په بریالیتوب سره سم شول");

        return redirect("stock/submission");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sub = Submission::find($id);
        $sub->is_returned = true;

        $sub->save();
        Alert::success("تسلیمی په بریالیتوب سره واخیستل شوه");

        // Alert::success("تسلیمی په بریالیتوب سره له منځه یوړل شوه");

        return redirect("stock/submission");
    }

    /**
     * Search the specified resource in the database
     */
    public function search(Request $request)
    {
        $search = $request->search;

        $submissions = Submission::where(function ($query) use ($search) {
            $query->where("id", "%$search%");
        });

        return redirect("stock/submission");
    }
}
