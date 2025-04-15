<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Http\Requests\StoreDayRequest;
use App\Http\Requests\UpdateDayRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class DayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //     $this->middleware('permission:view-days|create-days|edit-days|delete-days', ['only' => ['index', 'store']]);
    //     $this->middleware('permission:create-days', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:edit-days', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:delete-days', ['only' => ['destroy']]);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $days = Day::orderBy('id', 'ASC')->paginate(10);
        return view('days.index', compact('days'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('days.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDayRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDayRequest $request)
    {
        Day::create(['name' => $request->input('name')]);

        Alert::success('ورځ په بریالیتوب سره جوړه شوه');

        return redirect('/settings/days');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Day  $day
     * @return \Illuminate\Http\Response
     */
    public function show(Day $day)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Day  $day
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $day = Day::find($id);

        return view('days.edit', compact('day',));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDayRequest  $request
     * @param  \App\Models\Day  $day
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDayRequest $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $day = Day::find($id);
        $day->name = $request->input('name');
        $day->save();

        Alert::success('ورځ په بریالیتوب سره سمه شوه');

        return redirect('/settings/days');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Day  $day
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("days")->where('id', $id)->delete();

        Alert::success('ورځ په بریالیتوب سره له منځه یوړل شوه');

        return redirect('/settings/days');
    }
}
