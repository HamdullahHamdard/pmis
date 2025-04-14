<?php

namespace App\Http\Controllers;

use App\Models\Form9;
use App\Http\Requests\StoreForm9Request;
use App\Http\Requests\UpdateForm9Request;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Item;
use \Morilog\Jalali\Jalalian;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class Form9Controller extends Controller
{


    // function __construct()
    // {
    //     $this->middleware("permission:view-employees");
    //     $this->middleware("permission:create-employees", [
    //         "only" => ["create", "store"],
    //     ]);
    //     $this->middleware("permission:edit-employees", [
    //         "only" => ["edit", "update"],
    //     ]);
    //     $this->middleware("permission:delete-employees", [
    //         "only" => ["destroy"],
    //     ]);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms = Form9::with('items')->latest()->paginate(10);
        return view("form9.index", compact("forms"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        $items = Item::all();
        $items_query = Item::query();
        $departments = Department::all();
        $employees = Employee::all();
        $searchParam = $request->query("q");
        if ($searchParam) {
            $items_query = $items_query->where(function ($query) use (
                $searchParam
            ) {
                $query
                    ->orWhere("name", "like", "%$searchParam%");
            });

            // $items_query = $items_query->orWhereHas('categories', function ($query) use ($searchParam) {
            //     $query
            //         ->orWhere('name', 'like', "%$searchParam%");
            // });
        }
        return view("form9.create", compact("items","searchParam",'departments','employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreForm9Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreForm9Request $request)
    {
        $validated = $request->validated();
        $date = Jalalian::now();
        $year = $date->getYear();
        $month = $date->getMonth();
        $day = $date->getDay();
        $currentDate = $year.'/'.$month.'/'.$day;
        $itemName = null;

        // Alert::success("نوۍ تسلیمي په بریالیتوب سره اضافه شوه");

        $items = $request->items;

        dd($items);

        if(!isEmpty($request->input("item_name"))) {
            $itemName = $request->input("item_name");
        }
        $form9 = Form9::create([
            "department_id"=> $request->input("department_id"),
            "employee_id"=> $request->input("employee_id"),
            "requested_management"=> $request->input("requested_management"),
            "form_date"=> $currentDate,
            "first_details"=> $request->input("first_details"),
            "second_details"=> $request->input("second_details"),
            "manager_name"=> $request->input("manager_name"),
            "item_name"=> $itemName,
        ]);

        if(empty($request->input("item_name"))){
            // TODO:: many to many relation ships
            $form9->items()->attach($items,['quantity' => 1]);
        }


        Alert::success("نوۍ پورم په بریالیتوب سره اضافه شو");

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Form9  $form9
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view("form9.show");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Form9  $form9
     * @return \Illuminate\Http\Response
     */
    public function edit(Form9 $form9)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateForm9Request  $request
     * @param  \App\Models\Form9  $form9
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateForm9Request $request, Form9 $form9)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Form9  $form9
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form9 $form9)
    {
        //
    }
}
