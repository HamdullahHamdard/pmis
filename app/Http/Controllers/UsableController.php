<?php

namespace App\Http\Controllers;

use App\Models\Usable;
use App\Http\Requests\StoreUsableRequest;
use App\Http\Requests\UpdateUsableRequest;
use App\Models\Currency;
use App\Models\Day;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Month;
use App\Models\Province;
use App\Models\Unit;
use App\Models\UsableSubmission;
use App\Models\UsableType;
use App\Models\Year;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\Pdf;
// use PDF;
use ArPHP\I18N\Arabic;
use Illuminate\Support\Facades\Auth;

class UsableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware("permission:view-usables");
        $this->middleware("permission:create-usables", [
            "only" => ["create", "store"],
        ]);
        $this->middleware("permission:edit-usables", [
            "only" => ["edit", "update"],
        ]);
        $this->middleware("permission:delete-usables", ["only" => ["destroy"]]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $usables = Usable::orderBy("id", "ASC")->paginate(10);
        $usables_query = Usable::query();

        // $sortColumn = $request->query('sortColumn');
        // $sortDirection = $request->query('sortDirection');
        $searchParam = $request->query("q");

        // if ($sortColumn && $sortDirection) {
        //     $usables_query->orderBy($sortColumn, $sortDirection ?: 'asc');
        // }

        if ($searchParam) {
            $usables_query = $usables_query->where(function ($query) use (
                $searchParam
            ) {
                $query
                    ->orWhere("name", "like", "%$searchParam%")
                    ->orWhere("total", "like", "%$searchParam%")
                    ->orWhere("usable_type_id", "like", "%$searchParam%");
            });
        }

        $usables = $usables_query->orderBy("id", "DESC")->paginate(20);

        $usableTypes = UsableType::all();

        // Total Stationary Items Available in Stock
        $totalStationary = 0;



        if (auth()->user()->province_id == 13) {

            $totalStationary = number_format(
                Usable::where("usable_type_id","=", "1")->count("id"),
                0,
                " ",
                ","
            );
        }else{
            $totalStationary = number_format(Usable::where("province_id", auth()->user()->province_id)->where("usable_type_id","=", "1")->count("id"), 0, " ", ",");
        }

        $totalStationaryItems = 0;

        if (auth()->user()->province_id == 13) {

        $totalStationaryItems = number_format(
            Usable::where("usable_type_id","=", "1")->count("id") -
                UsableSubmission::where("usable_type_id","=",  value: "1")->count("id"),
            0,
            " ",
            ","
        );
    }else{
        $totalStationaryItems = number_format(Usable::where("province_id", auth()->user()->province_id)->where("usable_type_id","=", "1")->count("id"), 0, " ", ",") - UsableSubmission::where("province_id", auth()->user()->province_id)->where("usable_type_id",'=', "1")->count("id");
    }

        // Total Food Items Available in Stock
        $totalFood = 0;
        if (auth()->user()->province_id == 13) {

        $totalFood = number_format(
            Usable::where("usable_type_id","=", "2")->count("id") -
                UsableSubmission::where("usable_type_id","=",  value: "2")->count("id"),
            0,
            " ",
            ","
        );
    }else{
        $totalFood = number_format(Usable::where("province_id", auth()->user()->province_id)->where("usable_type_id","=", "2")->count("id"), 0, " ", ",") - UsableSubmission::where("province_id", auth()->user()->province_id)->where("usable_type_id",'=', "2")->count("id");
    }
    //     $totalFood = 0;
    //     if (auth()->user()->province_id == 13) {

    //     $totalFood = number_format(
    //         Usable::where(column: "usable_type_id", operator: "2")->count( "id") -
    //             UsableSubmission::where("usable_type_id", "=",  value: "3")->count("id"),
    //         0,
    //         " ",
    //         ","
    //     );
    // }else{
    //     $totalFood = number_format(Usable::where("province_id", auth()->user()->province_id)->where("usable_type_id", "2")->count("id"), 0, " ", ",") - UsableSubmission::where("province_id", auth()->user()->province_id)->where("usable_type_id", 2)->sum("total");
    // }


    $totalOil = 0;
        if (auth()->user()->province_id == 13) {

        $totalOil = number_format(
            Usable::where("usable_type_id","=", "3")->count("id") -
                UsableSubmission::where("usable_type_id","=",  value: "3")->count("id"),
            0,
            " ",
            ","
        );
    }else{
        $totalOil = number_format(Usable::where("province_id", auth()->user()->province_id)->where("usable_type_id","=", "3")->count("id"), 0, " ", ",") - UsableSubmission::where("province_id", auth()->user()->province_id)->where("usable_type_id",'=', "3")->count("id");
    }

        // Total Oil Available in Stock
        // $totalOil = number_format(
        //     Usable::where("usable_type_id", "3")->count("id"),
        //     0,
        //     " ",
        //     ","
        // );

        // Total Diesel Available in Stock
        // $totalDieselFuel = number_format(
        //     Usable::where("usable_type_id", "5")->sum("total") -
        //         UsableSubmission::where("usable_type_id", 5)->sum("total"),
        //     0,
        //     " ",
        //     ","
        // );

        // Total Fuel - Sum of both
        // $totalFuelSum = $totalPetrolFuel + $totalDieselFuel;

        // Total Price of All Usables
        $totalUsableValue = 0;
        if(auth()->user()->province_id == 13){
            $totalUsableValue = number_format(
                Usable::sum("total_price"),
                2,
                ".",
                ","
            );
        }else{
            $totalUsableValue = number_format(
                Usable::where('province_id', '=', auth()->user()->province_id)->sum("total_price"),
                2,
                ".",
                ","
            );
        }


        // Total Items Based on Types
        $totalStationaryTypeItems = Usable::where("usable_type_id", "1")->count(
            "id"
        );
        $totalFoodTypeItems = Usable::where("usable_type_id", "2")->count("id");
        $totalOilTypeItems = Usable::where("usable_type_id", "3")->count("id");

        $units = Unit::all();
        $years = Year::all();
        $months = Month::all();
        $days = Day::all();
        $provinces = Province::all();

        return view(
            "usables.index",
            compact(
                "usables",
                "searchParam",
                "usableTypes",
                "units",
                "years",
                "months",
                "days",
                "provinces",
                "totalStationaryItems",
                "totalStationary",
                "totalFood",
                "totalOil",
                "totalUsableValue",
                "totalStationaryTypeItems",
                "totalFoodTypeItems",
                "totalOilTypeItems"
            )
        );
    }

    /**
     * Download PDF View
     */
    public function download(request $request, $id)
    {
        $arabic = new Arabic();

        $item = Usable::find($id);
        $usableTypes = UsableType::all();
        $units = Unit::all();
        $currencies = Currency::all();
        $employees = Employee::all();
        $departments = Department::all();
        $usableSubmissions = UsableSubmission::all();

        $data = [
            "title" => "Usable Item Report",
            "date" => date("d/m/Y"),
            "item" => $item,
            "usableTypes" => $usableTypes,
            // "units" => $units,
            // "currencies" => $currencies,
            // "employees" => $employees,
            // "departments" => $departments,
            // "usableSubmissions" => $usableSubmissions
        ];

        // $output = $arabic->utf8Glyphs($data["item"]);
        // $output2 = $arabic->utf8Glyphs($data["usableTypes"]);
        // $finalData = [$output, $output2];

        // $data = $item;

        $p = $arabic->arIdentify($data["item"]);

        for ($i = count($p) - 1; $i >= 0; $i -= 2) {
            $utf8ar = $arabic->utf8Glyphs(
                substr($data["item"], $p[$i - 1], $p[$i] - $p[$i - 1])
            );
            $data = substr_replace(
                $data,
                $utf8ar,
                $p[$i - 1],
                $p[$i] - $p[$i - 1]
            );
        }

        // if ($request->has("download")) {
        // $pdf = PDF::loadView("usables.downloads.UsableItemDownload", $data);
        // return $pdf->download("usable-item-report.pdf");
        // }

        // return $pdf->stream();

        // return view("usables.index");

        // Pdf::setOption(["dpi" => 150, "defaultFont" => "arial"]);
        // $pdf = Pdf::loadView("usables.downloads.UsableItemDownload", $data);
        // return $pdf->download("usable-item-report.pdf");

        $user = Auth::user();

        $finalData = $arabic->utf8Glyphs($user->name);

        $output = [$finalData];

        // view()->share("user", $user);
        $pdf = Pdf::loadView("usables.downloads.UsableItemDownload", $output);
        return $pdf->download("report.pdf");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usableTypes = UsableType::all();
        $units = Unit::all();
        $currencies = Currency::all();
        $years = Year::orderBy('id', 'DESC')->get();
        $months = Month::all();
        $days = Day::all();
        $provinces = Province::all();

        return view(
            "usables.create",
            compact("usableTypes", "units", "currencies", "years", "months", "days", "provinces")
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUsableRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsableRequest $request)
    {
        Usable::create([
            "name" => $request->name,
            "usable_type_id" => $request->input("type"),
            "unit_id" => $request->input("unit"),
            "details" => $request->details,
            "total" => $request->total,
            "unit_price" => $request->unitPrice,
            "total_price" => $request->totalPrice,
            "currency_id" => $request->input("purchasePriceCurrency"),
            "province_id" => auth()->user()->province_id,
            "purchaseYear_id" => $request->input("purchaseYear"),
            "purchaseMonth_id" => $request->input("purchaseMonth"),
            "purchaseDay_id" => $request->input("purchaseDay"),
        ]);

        Alert::success("مصرفی جنس په بریالیتوب سره اضافه شو");

        return redirect("stock/usables");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usable  $usable
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Usable::find($id);
        $usableTypes = UsableType::all();
        $units = Unit::all();
        $years = Year::all();
        $months = Month::all();
        $days = Day::all();
        $provinces = Province::all();
        $currencies = Currency::all();
        $employees = Employee::all();
        $departments = Department::all();
        $usableSubmissions = UsableSubmission::all();

        return view(
            "usables.show",
            compact(
                "item",
                "usableTypes",
                "units",
                "years",
                "months",
                "days",
                "provinces",
                "currencies",
                "departments",
                "usableSubmissions",
                "usableSubmissions"
            )
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usable  $usable
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Usable::find($id);
        $usableTypes = UsableType::all();
        $currencies = Currency::all();
        $units = Unit::all();
        $provinces = Province::all();
        $itemProvince = $item->province_id;
        $years = Year::all();
        $itemYear = $item->purchaseYear_id;
        $months = Month::all();
        $itemMonth = $item->purchaseMonth_id;
        $days = Day::all();
        $itemDay = $item->purchaseDay_id;

        return view(
            "usables.edit",
            compact("item", "usableTypes", "currencies", "units", "provinces",
            "itemProvince",
            "years",
            "itemYear",
            "months",
            "itemMonth",
            "days",
            "itemDay")
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUsableRequest  $request
     * @param  \App\Models\Usable  $usable
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsableRequest $request, $id)
    {
        $item = Usable::find($id);
        $item->name = $request->name;
        $item->usable_type_id = $request->input("type");
        $item->unit_id = $request->input("unit");
        $item->details = $request->details;
        $item->total = $request->total;
        $item->unit_price = $request->unitPrice;
        $item->total_price = $request->totalPrice;
        $item->currency_id = $request->input("purchasePriceCurrency");
        $item->province_id = auth()->user()->province_id;
        $item->purchaseYear_id = $request->input("purchaseYear");
        $item->purchaseMonth_id = $request->input("purchaseMonth");
        $item->purchaseDay_id = $request->input("purchaseDay");

        $item->save();

        Alert::success("د مصرفی جنس معلومات په بریالیتوب سره سم شول");

        return redirect("stock/usables");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usable  $usable
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Usable::find($id);

        // First delete the submissions for this item
        $usableSubmissions = UsableSubmission::all();

        foreach ($usableSubmissions as $submission) {
            if ($submission->item_id == $item->id) {
                $submission->delete();
            }
        }

        $item->delete();

        Alert::success(
            "مصرفی جنس او د هغه تسلیمیانی په بریالیتوب سره له منځه یوړل شول"
        );

        return redirect("stock/usables");
    }
}
