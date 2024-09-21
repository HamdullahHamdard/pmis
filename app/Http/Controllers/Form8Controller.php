<?php

namespace App\Http\Controllers;

use App\Models\Form8;
use App\Http\Requests\StoreForm8Request;
use App\Http\Requests\UpdateForm8Request;
use App\Models\Form5;
use App\Models\Unit;
use Illuminate\Http\Request;

class Form8Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $form8s = Form8::paginate(10);
        return view('form8.index', compact('form8s'));
    }
    public function getForm5Details($id)
    {
        $form5 = Form5::find($id);
        return response()->json([
            'distribution_date' => $form5->distribution_date,
            'details' => $form5->details,
            'submissions' => $form5->submissions,
            'form9s_id' => $form5->form9s_id,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $form5_id = $request->input('form5_id'); // match the select name
        $form5s = Form5::all();

        $selectedForm5 = null;

        if ($form5_id) {
            $selectedForm5 = Form5::with('submissions')->find($form5_id);

            // dd($selectedForm5);

            if (!$selectedForm5) {
                return redirect()->back()->with('error', 'No records found for the selected Form5.');
            }
        }

        return view('form8.create', compact('form5s', 'selectedForm5'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreForm8Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreForm8Request $request)
    {
        //
        dd($request->submissions_ids);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Form8  $form8
     * @return \Illuminate\Http\Response
     */
    public function show(Form8 $form8)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Form8  $form8
     * @return \Illuminate\Http\Response
     */
    public function edit(Form8 $form8)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateForm8Request  $request
     * @param  \App\Models\Form8  $form8
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateForm8Request $request, Form8 $form8)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Form8  $form8
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form8 $form8)
    {
        //
    }
}
