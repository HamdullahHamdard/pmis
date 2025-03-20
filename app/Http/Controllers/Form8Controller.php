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
use RealRashid\SweetAlert\Facades\Alert;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get all available Form5s with non-returned submissions
        $form5s = Form5::whereHas('submissions', function ($query) {
            $query->where('is_returned', false);
        })->with(['submissions' => function ($query) {
            $query->where('is_returned', false);
        }])->get();

        return view('form8.select-form', compact('form5s'));
    }

    /**
     * Process the form selection and show the item selection page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function selectForm(Request $request)
    {
        $request->validate([
            'form5_id' => 'required|exists:form5s,id',
        ]);

        $form5_id = $request->form5_id;

        return redirect()->route('form8s.select-items', ['form5_id' => $form5_id]);
    }

    /**
     * Show the item selection page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function selectItems(Request $request)
    {
        $form5_id = $request->form5_id;

        if (!$form5_id) {
            return redirect()->route('form8s.create')
                ->with('error', 'لطفا ابتدا یک فورم را انتخاب کنید');
        }

        $selectedForm5 = Form5::with(['submissions' => function ($query) {
            $query->where('is_returned', false);
        }])->find($form5_id);

        if (!$selectedForm5) {
            return redirect()->route('form8s.create')
                ->with('error', 'فورم انتخاب شده یافت نشد');
        }

        $submissions = $selectedForm5->submissions->where('is_returned', false);

        if ($submissions->isEmpty()) {
            return redirect()->route('form8s.create')
                ->with('error', 'هیچ موردی برای فورم انتخاب شده یافت نشد');
        }

        // Handle "select all" action
        if ($request->has('select_all') && $request->select_all == 1) {
            $submissionIds = $submissions->pluck('id')->toArray();
            return redirect()->route('form8s.add-details', [
                'form5_id' => $form5_id,
                'submission_ids' => $submissionIds
            ]);
        }

        return view('form8.select-items', compact('selectedForm5', 'submissions'));
    }

    /**
     * Process the item selection and show the details page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function processItemSelection(Request $request)
    {
        $request->validate([
            'form5_id' => 'required|exists:form5s,id',
            'submission_ids' => 'required|array|min:1',
            'submission_ids.*' => 'exists:submissions,id',
        ]);

        $form5_id = $request->form5_id;
        $submissionIds = $request->submission_ids;

        return redirect()->route('form8s.add-details', [
            'form5_id' => $form5_id,
            'submission_ids' => $submissionIds
        ]);
    }

    /**
     * Show the details page for adding prices and certified persons.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addDetails(Request $request)
    {
        $form5_id = $request->form5_id;
        $submissionIds = $request->submission_ids;

        if (!$form5_id || !$submissionIds) {
            return redirect()->route('form8s.create')
                ->with('error', 'اطلاعات ناقص است. لطفا از ابتدا شروع کنید');
        }

        $selectedForm5 = Form5::find($form5_id);

        if (!$selectedForm5) {
            return redirect()->route('form8s.create')
                ->with('error', 'فورم انتخاب شده یافت نشد');
        }

        $selectedSubmissions = Submission::whereIn('id', $submissionIds)
            ->where('is_returned', false)
            ->get();

        if ($selectedSubmissions->isEmpty()) {
            return redirect()->route('form8s.select-items', ['form5_id' => $form5_id])
                ->with('error', 'هیچ موردی انتخاب نشده است');
        }

        return view('form8.add-details', compact('selectedForm5', 'selectedSubmissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'form5_id' => 'required|exists:form5s,id',
            'submission_ids' => 'required|array|min:1',
            'submission_ids.*' => 'exists:submissions,id',
            'new_prices' => 'required|array',
            'new'  => 'exists:submissions,id',
            'new_prices' => 'required|array',
            'new_prices.*' => 'required|numeric',
            'certified_persons' => 'required|array',
            'certified_persons.*' => 'required|numeric',
        ]);

        // Process each submission
        foreach ($request->submission_ids as $id) {
            // Find the submission
            $submission = Submission::find($id);
            $total = $request->new_quantity[$id];
            if($submission->total < $total)
            {
                Alert::error("داخل شوی مقدار مو د توزیع تر مقدار زیات دی");
                return redirect()->back();
            }
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
                if($submission->total == $total){
                    $submission->is_returned = true;
                }if($submission->total > $total){
                    $submission->is_returned = false;
                }

                // $submission->certified_person_id = $certified_person;
                $submission->save();
            }
        }

        return redirect()->route('form8s.index')->with('success', 'فورم با موفقیت ثبت شد');
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
