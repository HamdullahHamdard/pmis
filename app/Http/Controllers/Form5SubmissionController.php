<?php

namespace App\Http\Controllers;

use App\Models\Form5;
use App\Models\Form5Submission;
use App\Http\Requests\StoreForm5SubmissionRequest;
use App\Http\Requests\UpdateForm5SubmissionRequest;
use App\Models\Form9;
use App\Models\Item;
use App\Models\Submission;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class Form5SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $formItems = Form5Submission::where('form5_id', '=', $id)->get();
        $items ;
        if(auth()->user()->province_id == 13){
            $items = DB::table('items')->select('id', 'name')->get();
        }else{
            $items = DB::table('items')->select('id', 'name')->where('province_id', '=', auth()->user()->province_id)->get();
        }

        // Initialize an empty array to store submission IDs
        $submissionIds = [];

        // Iterate through each item in the collection
        foreach ($formItems as $formItem) {
            // Assuming 'submission_id' is a valid property on Form5Submission
            $submissionIds[] = $formItem->submission_id;
        }

        // Now you can use the retrieved submission IDs as needed
        // For example, if you want to find submissions based on these IDs:
        $submissions = Submission::whereIn('id', $submissionIds)->get();
        // $submissions = Submission::all();
        return view("form5.form5Submission.index", compact('formItems','submissions', 'id', 'items'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $items = DB::table('items')->select('id', 'name')->where('province_id', '=', auth()->user()->province_id)->get();
        // $submissions = Submission::all();
        return view('form5.form5Submission.create', compact('items', 'id'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFormItemsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreForm5SubmissionRequest $request, $id) : RedirectResponse
    {
        $request->validated();
        $itemsQuantity = Item::where('id','=',$request->item_id)->first();
        if($itemsQuantity->total < $request->quantity)
        {
            Alert::warning(" د جنس مقدار ".$request->quantity." په ګدام کی موجود نه دی " );
            return redirect()->back();

        }else{
            $form5s = Form5::where('id','=',$id)->select('form9s_id', 'id')->first();
            $form9 = Form9::where('id','=',$form5s->form9s_id)->select('department_id', 'employee_id')->first();

            $submission = Submission::create([
                "employee_id" => $form9->employee_id,
                "department_id" => $form9->department_id,
                "item_id" => $request->item_id,
                "province_id"=> auth()->user()->province_id,
                "total" => $request->quantity,
                "is_returned" => false
            ]);

            $form5Submision = Form5Submission::create([
                "form5_id"=> $form5s->id,
                "submission_id"=> $submission->id,
            ]);
            Alert::success("نوۍ جنس و فورم ته په بریالیتوب سره اضافه شو");
            return redirect('/formSubmission/'.$id);
        }










    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FormItems  $formItems
     * @return \Illuminate\Http\Response
     */
    public function show($formItems)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FormItems  $formItems
     * @return \Illuminate\Http\Response
     */
    public function edit( $formItemsId, $id)
    {
        //
        $formItems = Form5Submission::find($formItemsId);
        $items = DB::table('items')->select('id', 'name')->where('province_id', '=', auth()->user()->province_id)->get();
        $submission = Submission::find($formItems->submission_id);
        $submissions = Submission::all();
        return view('form5.form5Submission.edit', compact('items','submission','submissions', 'id','formItems'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateForm5SubmissionRequest $request, $id, $form5_id)
    {
        $request->validated();
        $formItems =  Form5Submission::find( $id );
        $submission = Submission::find($formItems->submission_id);
        $request->validated();

        $itemsQuantity = Item::where('id','=',$request->item_id)->first();
        if($itemsQuantity->total < $request->quantity)
        {
            Alert::warning(" د جنس مقدار ".$request->quantity." په ګدام کی موجود نه دی " );
            return redirect()->back();

        }else{
            $form5s = Form5::where('id','=',$form5_id)->select('form9s_id', 'id')->first();
            $form9 = Form9::where('id','=',$form5s->form9s_id)->select('department_id', 'employee_id')->first();

            $submission->update([
                "employee_id" => $form9->employee_id,
                "department_id" => $form9->department_id,
                "item_id" => $request->item_id,
                "province_id"=> auth()->user()->province_id,

                "total" => $request->quantity,
                "is_returned" => false
            ]);

            $formItems->update([
                "form5_id"=> $form5s->id,
                "submission_id"=> $submission->id,
            ]);
            Alert::success("نوۍ جنس و فورم ته په بریالیتوب سره اضافه شو");
            return redirect('/formSubmission/'.$form5_id);
        }
    }


    public function destroy($id)
    {
        //
        $formItems = Form5Submission::find($id);

        $submission = Submission::where('id', '=', $formItems->submission_id)->first();
        $submission->is_returned = true;

        $submission->save();

        $formItems->delete();

        return redirect()->back();
    }
}
