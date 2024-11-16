<?php

namespace App\Http\Controllers;

use App\Models\UsableType;
use App\Http\Requests\StoreUsableTypeRequest;
use App\Http\Requests\UpdateUsableTypeRequest;
use App\Models\Usable;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UsableTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware(
            "permission:view-usableTypes|create-usableTypes|edit-usableTypes|delete-usableTypes",
            ["only" => ["index", "store"]]
        );
        $this->middleware("permission:create-usableTypes", [
            "only" => ["create", "store"],
        ]);
        $this->middleware("permission:edit-usableTypes", [
            "only" => ["edit", "update"],
        ]);
        $this->middleware("permission:delete-usableTypes", [
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
        $types = UsableType::orderBy("id", "ASC")->paginate(10);
        return view("usableTypes.index", compact("types"))->with(
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
        return view("usableTypes.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUsableTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsableTypeRequest $request)
    {
        UsableType::create(["name" => $request->input("name")]);

        Alert::success("نوعیت جدید جنس مصرفی موفقانه اضافه گردید");

        return redirect("stock/usables/types");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UsableType  $usableType
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usableType = UsableType::find($id);
        return view("usableTypes.show", compact("usableType"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UsableType  $usableType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usableType = UsableType::find($id);
        return view("usableTypes.edit", compact("usableType"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUsableTypeRequest  $request
     * @param  \App\Models\UsableType  $usableType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsableTypeRequest $request, $id)
    {
        $usableType = UsableType::find($id);
        $usableType->name = $request->name;

        $usableType->save();

        Alert::success("معلومات نوعیت جنس مصرفی موفقانه تغیر داده شد");

        return redirect("stock/usables/types");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UsableType  $usableType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UsableType::find($id)->delete();

        Alert::success("نوعیت جنس مصرفی موفقانه از سیستم پاک گردید");

        return redirect("stock/usables/types");
    }
}
