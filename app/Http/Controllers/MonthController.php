<?php

namespace App\Http\Controllers;

use App\Models\Month;
use App\Http\Requests\StoreMonthRequest;
use App\Http\Requests\UpdateMonthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class MonthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //     $this->middleware('permission:view-months|create-months|edit-months|delete-months', ['only' => ['index', 'store']]);
    //     $this->middleware('permission:create-months', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:edit-months', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:delete-months', ['only' => ['destroy']]);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $months = Month::orderBy('id', 'ASC')->paginate(10);
        return view('months.index', compact('months'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('months.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMonthRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMonthRequest $request)
    {
        Month::create(['name' => $request->input('name')]);

        Alert::success('نوۍ میاشته په بریالیتوب سره جوړه شوه');

        return redirect('/settings/months');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Month  $month
     * @return \Illuminate\Http\Response
     */
    public function show(Month $month)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Month  $month
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $month = Month::find($id);

        return view('months.edit', compact('month',));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMonthRequest  $request
     * @param  \App\Models\Month  $month
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMonthRequest $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $month = Month::find($id);
        $month->name = $request->input('name');
        $month->save();

        Alert::success('میاشته په بریالیتوب سره سمه شوه');

        return redirect('/settings/months');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Month  $month
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("months")->where('id', $id)->delete();

        Alert::success('میاشته په بریالیتوب سره له منځه یوړل شوه');

        return redirect('/settings/months');
    }
}
