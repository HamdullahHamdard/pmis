<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Http\Requests\StoreUnitRequest;
use App\Http\Requests\UpdateUnitRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //     $this->middleware("permission:view-units");
    //     $this->middleware("permission:create-units", [
    //         "only" => ["create", "store"],
    //     ]);
    //     $this->middleware("permission:edit-units", [
    //         "only" => ["edit", "update"],
    //     ]);
    //     $this->middleware("permission:delete-units", [
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
        $units = Unit::orderBy("id", "ASC")->paginate(10);
        return view("units.index", compact("units"))->with(
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
        return view("units.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUnitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUnitRequest $request)
    {
        Unit::create([
            "name" => $request->name,
        ]);

        Alert::success("نوۍ واحد په بریالیتوب سره جوړ شو");

        return redirect("stock/units");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unit = Unit::find($id);
        return view("units.show", compact("unit"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unit = Unit::find($id);

        return view("units.edit", compact("unit"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUnitRequest  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $unit = Unit::find($id);
        $unit->name = $request->name;

        $unit->save();

        Alert::success("د واحد معلومات په بریالیتوب سره سم شول");

        return redirect("stock/units");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Unit::find($id)->delete();

        Alert::success("واحد په بریالیتوب سره له منځه یوړل شو");

        return redirect("stock/units");
    }
}
