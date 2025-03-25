<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsableSubmissionRequest;
use App\Http\Requests\UpdateUsableSubmissionRequest;
use App\Models\Department;
use App\Models\Province;
use App\Models\Usable;
use App\Models\UsableSubmission;
use App\Models\UsableType;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UsableSubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware("permission:view-usableSubmission");
        $this->middleware("permission:create-usableSubmission", [
            "only" => ["create", "store"],
        ]);
        $this->middleware("permission:edit-usableSubmission", [
            "only" => ["edit", "update"],
        ]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        if(auth()->user()->province_id == 13){
            $usableSubmissions = UsableSubmission::orderBy("id", "DESC")->paginate(
                20
            );
        }else{
            $usableSubmissions = UsableSubmission::orderBy("id", "DESC")->where("province_id",'=', auth()->user()->province_id)->paginate(
                20
            );
        }

        $departments = Department::all();
        $usableItems = Usable::all();
        $usableTypes = UsableType::all();
        $provinces = Province::all();

        return view(
            "usableSubmission.index",
            compact(
                "usableSubmissions",
                "departments",
                "usableItems",
                "usableTypes",
                "provinces"
            )
        )->with("i", ($request->input("page", 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        $usableItems = Usable::where('province_id', '=', auth()->user()->province_id)->get();
        $usableTypes = UsableType::all();

        return view(
            "usableSubmission.create",
            compact("departments", "usableItems", "usableTypes")
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUsableSubmissionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsableSubmissionRequest $request)
    {
        UsableSubmission::create([
            "department_id" => $request->input("depSubmission"),
            "item_id" => $request->item,
            "total" => $request->total,
            "usable_type_id" => $request->input("type"),
            "province_id" => auth()->user()->province_id
        ]);

        Alert::success(" مصرفی جنس په بریالیتوب سره ورکړل شو");

        return redirect("stock/usable/submission");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UsableSubmission  $usableSubmission
     * @return \Illuminate\Http\Response
     */
    public function show(UsableSubmission $usableSubmission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UsableSubmission  $usableSubmission
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $submission = UsableSubmission::find($id);
        $departments = Department::all();
        $usableItems = Usable::all();
        $usableTypes = UsableType::all();

        return view(
            "usableSubmission.edit",
            compact("submission", "departments", "usableItems", "usableTypes")
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUsableSubmissionRequest  $request
     * @param  \App\Models\UsableSubmission  $usableSubmission
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsableSubmissionRequest $request, $id)
    {
        $submission = UsableSubmission::find($id);
        $submission->department_id = $request->input("depSubmission");
        $submission->item_id = $request->item;
        $submission->total = $request->total;
        $submission->usable_type_id = $request->input("type");
        $submission->province_id = auth()->user()->province_id;

        $submission->update();

        Alert::success("د تسلیمي معلومات په بریالیتوب سره سم شول");

        return redirect("stock/usable/submission");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UsableSubmission  $usableSubmission
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UsableSubmission::find($id)->delete();

        Alert::success("تسلیمی په بریالیتوب سره له منځه یوړل شوه");

        return redirect("stock/usable/submission");
    }
}
