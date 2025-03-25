<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Http\Requests\StoreYearRequest;
use App\Http\Requests\UpdateYearRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:view-years|create-years|edit-years|delete-years', ['only' => ['index', 'store']]);
        $this->middleware('permission:create-years', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-years', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-years', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $years = Year::orderBy('id', 'DESC')->paginate(10);
        return view('years.index', compact('years'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('years.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreYearRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreYearRequest $request)
    {
        Year::create(['name' => $request->input('name')]);

        Alert::success('نوۍ کال په بریالیتوب سره جوړ شو');

        return redirect('/settings/years');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Year  $year
     * @return \Illuminate\Http\Response
     */
    public function show(Year $year)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Year  $year
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $year = Year::find($id);

        return view('years.edit', compact('year',));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateYearRequest  $request
     * @param  \App\Models\Year  $year
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateYearRequest $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $year = Year::find($id);
        $year->name = $request->input('name');
        $year->save();

        Alert::success('کال په بریالیتوب سره سم شو');

        return redirect('/settings/years');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Year  $year
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("years")->where('id', $id)->delete();

        Alert::success('کال په بریالیتوب سره له منځه یوړل شو');

        return redirect('/settings/years');
    }
}
