<?php

namespace App\Http\Controllers;

use App\Models\Form5;
use App\Http\Requests\StoreForm5Request;
use App\Http\Requests\UpdateForm5Request;
use App\Models\Day;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Form5Submission;
use App\Models\Form9;
use App\Models\FormItems;
use App\Models\Item;
use App\Models\Month;
use App\Models\Submission;
use App\Models\Unit;
use App\Models\Year;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use \Morilog\Jalali\Jalalian;


class Form5Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //




        $forms = Form5::with('submissions')->latest()->paginate(10);
        $items = DB::table('items')->select('id', 'name')->get();
        $employees = DB::table('employees')->select('id', 'name')->get();
        $form9s = DB::table('form9s')->select('id', 'employee_id')->get();
        $provinces = DB::table('provinces')->select('id','name')->get();
        $formItems = Form5Submission::all();

        return view('form5.index', compact('forms', 'provinces','formItems','form9s','employees',  'items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $years = Year::all();
        $months = Month::all();
        $days = Day::all();

        $form9s = Form9::latest()->paginate(10);
        $items = DB::table('items')->select('id', 'name')->get();

        $employees = DB::table('employees')->select('id', 'name')->where('province_id', '=', auth()->user()->province_id)->get();
        $departments = DB::table('departments')->select('id', 'name')->get();
        $form5s = Form5::all();

        return view('form5.create', compact('items','form9s','years','months','days', 'employees', 'departments'));

}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreForm5Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreForm5Request $request) : RedirectResponse
    {
        // validation and current shamsi date
        $validated = $request->validated();
        $date = Jalalian::now();
        $year = $date->getYear();
        $month = $date->getMonth();
        $day = $date->getDay();
        $currentDate = $year.'/'.$month.'/'.$day;
        $pc9date = $request->input('year').'/'.$request->input('month').'/'.$request->input('day');

        // dd($request->input("employee_id"));
        $form9 = new Form9;
        $form9->form9s_number = $request->input("form9_id");
        $form9->department_id = $request->input('department_id');
        $form9->employee_id = $request->input("employee_id");
        $form9->form_date = $pc9date;
        $form9->save();



        $distribution_warehouse = $request->input('warehouse');
        // dd('this is '.$distribution_warehouse);

        $form5 = new Form5;
            $form5->form9s_id= $form9->id;
            $form5->distribution_warehouse  =  $distribution_warehouse;
            $form5->distribution_date = $currentDate;
            $form5->details = $request->input('details');
            $form5->province_id = auth()->user()->province_id;


            $form5->save();

        // TODO:: many to many relation ships
        // $form5->items()->attach($categories);

        Alert::success("نوۍ توزیع په بریالیتوب سره ترسره شوه");

        return redirect('/form5s');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Form5  $form5
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $form = Form5::find($id);
        $formItems = Form5Submission::where('form5_id', '=', $form->id)->get();
        $submissions = Submission::all();
        // dd($submissions);
        $units = Unit::all();
        $department = Department::where('id','=', $form->form9s->department_id)->first();
        $items = Item::all();

        return view('form5.show', compact('form','items', 'formItems','department','submissions','units',  'department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Form5  $form5
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
        $form5s = Form5::find($id);
        $years = Year::all();
        $months = Month::all();
        $days = Day::all();

        $form9s = Form9::latest()->paginate(10);
        $items = DB::table('items')->select('id', 'name')->get();
        $employees = DB::table('employees')->select('id', 'name')->where('province_id', '=', auth()->user()->province_id)->get();
        $departments = DB::table('departments')->select('id', 'name')->get();


        return view('form5.edit', compact('form5s','items','form9s','years','months','days', 'employees', 'departments'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateForm5Request  $request
     * @param  \App\Models\Form5  $form5
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateForm5Request $request, $id)
    {
        $form5 =  Form5::find($id);
        $form9 = Form9::find( $form5->form9s_id);


        $validated = $request->validated();
        $date = Jalalian::now();
        $year = $date->getYear();
        $month = $date->getMonth();
        $day = $date->getDay();
        $currentDate = $year.'/'.$month.'/'.$day;
        $pc9date = $request->input('year').'/'.$request->input('month').'/'.$request->input('day');
        $distribution_warehouse = $request->input('warehouse');
        $formItems =  Form5Submission::where('form5_id', '=', $id)->get();

        $form9->id = $request->input("form9_id");
        $form9->department_id = $request->input('department_id');
        $form9->employee_id =  $request->input("employee_id");
        $form9->form_date = $pc9date;

        $form9->save();
        // Form 5 Submission
        foreach ($formItems as $formItem) {
            $submission = Submission::where('id', '=',$formItem->submission_id)->first();
            $submission->employee_id = $form9->employee_id;
            $submission->department_id = $form9->department_id;
            $submission->save();
        }


        // Form 5 Submission
        foreach ($formItems as $formItem) {
            $submission = Submission::where('id', '=',$formItem->submission_id)->first();
            $submission->employee_id = $form9->employee_id;
            $submission->department_id = $form9->department_id;
            $submission->save();
        }



        $form5->form9s_id= $form9->id;
            $form5->distribution_warehouse  =  $distribution_warehouse;
            $form5->distribution_date = $currentDate;
            $form5->details = $request->input('details');
            $form5->province_id = auth()->user()->province_id;
;





            $form5->save();

        // TODO:: many to many relation ships
        // $form5->items()->attach($categories);

        Alert::success("نوۍ توزیع په بریالیتوب سره ترسره شوه");

        return redirect('/form5s');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Form5  $form5
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        // dd($id);
        Alert::success("تاسی نه شی کولی چی دا فورم ډیلیټ کړی.");

        return redirect('/form5s');
    }
}
