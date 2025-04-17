<?php

namespace App\Http\Controllers;

use App\Models\Form8;
use App\Http\Requests\StoreForm8Request;
use App\Http\Requests\UpdateForm8Request;
use App\Models\Form5;
use App\Models\Item;
use App\Models\Submission;
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
        // Changed from GET to POST method to avoid exposing token in URL
        $form5_id = $request->input('form5_id');
        $form5s = Form5::whereHas('submissions', function ($query) {
            $query->where('is_returned', false);
        })->with(['submissions' => function ($query) {
            $query->where('is_returned', false);
        }])->get();

        $selectedForm5 = null;
        $submissions = null;

        if ($form5_id) {
            $selectedForm5 = Form5::with('submissions')->find($form5_id);

            if (!$selectedForm5) {
                return redirect()->back()->with('error', 'No records found for the selected Form5.');
            }

            $submissions = $selectedForm5->submissions->where('is_returned', false);
        }

        return view('form8.create', compact('form5s', 'submissions', 'selectedForm5'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreForm8Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreForm8Request $request)
    {
        // Validate that we have submission IDs
        if (!$request->has('submission_ids') || empty($request->submission_ids)) {
            return redirect()->back()->with('error', 'No items were selected for processing.');
        }

        // Validate that we have prices and certified persons for each submission
        foreach ($request->submission_ids as $id) {
            if (!isset($request->new_prices[$id]) || !isset($request->certified_persons[$id])) {
                return redirect()->back()->with('error', 'Missing price or certified person for one or more items.');
            }
        }

        // Process each submission
        foreach ($request->submission_ids as $id) {
            // Find the submission
            $submission = Submission::find($id);

            // Ensure submission exists before updating
            if ($submission) {
                $item_id = $submission->item_id;
                $new_price = $request->new_prices[$id];
                $certified_person = $request->certified_persons[$id];

                // Update the item
                $item = Item::find($item_id);
                if ($item) {
                    $item->purchase_price = $new_price;
                    $item->purchaseDay_id = 14;
                    $item->purchaseMonth_id = 11;
                    $item->purchaseYear_id = 33;
                    $item->m7number = 200;
                    $item->save();
                }

                // Mark submission as returned
                $submission->is_returned = true;
                $submission->certified_person_id = $certified_person;
                $submission->save();
            }
        }

        return redirect()->route('form8s.index')->with('success', 'Form submitted successfully.');
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
