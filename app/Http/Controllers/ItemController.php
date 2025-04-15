<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Day;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Item;
use App\Models\Month;
use App\Models\Province;
use App\Models\Submission;
use App\Models\Unit;
use App\Models\Year;
use Barryvdh\DomPDF\PDF as DomPDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use PDF;
Carbon::setLocale('fa_AF');

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //     $this->middleware("permission:view-items");
    //     $this->middleware("permission:create-items", [
    //         "only" => ["create", "store"],
    //     ]);
    //     $this->middleware("permission:edit-items", [
    //         "only" => ["edit", "update"],
    //     ]);
    //     $this->middleware("permission:delete-items", ["only" => ["destroy"]]);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        // $items = Item::orderBy("id", "ASC")->paginate(10);
        $items_query = Item::query();

        $searchParam = $request->query("q");

        if ($searchParam) {
            $items_query = $items_query->where(function ($query) use (
                $searchParam
            ) {
                $query
                    ->orWhere("id", "like", "%$searchParam%")
                    ->orWhere("name", "like", "%$searchParam%")
                    ->orWhere("category_id", "like", "%$searchParam%")
                    ->orWhere("item_stock_number", "like", "%$searchParam%");
            });

            // $items_query = $items_query->orWhereHas('categories', function ($query) use ($searchParam) {
            //     $query
            //         ->orWhere('name', 'like', "%$searchParam%");
            // });
        }

        $items ;
        if(auth()->user()->province_id == 13){
            $items = $items_query->orderBy("id", "DESC")->paginate(20);


        }else{
            $items = $items_query->orderBy("id", "DESC")->where('province_id', '=', auth()->user()->province_id)->paginate(20);

        }




        $categories = Category::all();
        $provinces = Province::all();
        $years = Year::all();

        $submissions = Submission::all();
        $totalSubmissions = Submission::count("id");

        return view(
            "items.index",
            compact(
                "items",
                "searchParam",
                "categories",
                "provinces",
                "years",
                "submissions",
                "totalSubmissions"
            )
        )->with("i", ($request->input("page", 1) - 1) * 10);
    }

    /**
     * Download the requested item
     */
    public function download(request $request, $id) {
        $item = Item::find($id);

        $data = [
            "title" => "Item Report",
            "date" => date("d/m/Y"),
            "item" => $item,
        ];

        if ($request->has("download")) {
            $pdf = DomPDF::loadView("index", $data);
            return $pdf->download("rta_item_report.pdf");
        }

        return view("items.index");
    }


    /**
     * Format the date
     */
    static public function formatDate($date) {
        return Carbon::parse($date)->format('d M, Y');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $categories = Category::all();
        $currencies = Currency::all();
        $units = Unit::all();
        $provinces = Province::all();
        $years = Year::orderBy("id", "DESC")->get();
        $months = Month::all();
        $days = Day::all();

        return view(
            "items.create",
            compact("categories", "currencies", "units", "provinces", "years", "months", "days")
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateItemRequest $request)
    {
        // $itemImages = [];

        // foreach ($request->file('itemImages') as $image) {
        //     $imageName =
        //         $image->getClientOriginalName() . '-' . time()
        //         . '.' . $image->getClientOriginalExtension();
        //     $image->move(public_path('images/items'), $imageName);
        //     $itemImages[] = $imageName;
        // }

        // $images = json_encode($itemImages);

        $image = $request->itemImages;

        $name = time() . "_" . $image->getClientOriginalName();

        $image->move(public_path("images/items"), $name);

        // ----- Using Storage ------
        // $image = Storage::put('items', $image);

        Item::create([
            "name" => $request->name,
            "total" => $request->total,
            "unit_id" => $request->input("unit"),
            "m7number" => $request->input("m7Number"),
            "details" => $request->details,
            "in_stock" => $request->inStock,
            "category_id" => $request->input("category"),
            "purchase_price" => $request->purchasePrice,
            "currency_id" => $request->input("purchasePriceCurrency"),
            "item_stock_number" => $request->itemStockNumber,
            "province_id" => auth()->user()->province_id,
            "purchaseYear_id" => $request->input("purchaseYear"),
            "purchaseMonth_id" => $request->input("purchaseMonth"),
            "purchaseDay_id" => $request->input("purchaseDay"),
            "images" => $name,
        ]);

        Alert::success("نوۍ جنس په بریالیتوب سره اضافه شو");

        return redirect("stock/items");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);
        $categories = Category::all();
        $currencies = Currency::all();
        $units = Unit::all();
        $years = Year::all();
        $months = Month::all();
        $days = Day::all();
        $provinces = Province::all();
        $employees = Employee::all();
        $departments = Department::all();
        $submissions = Submission::all();
        $itemDistributed = Submission::where("item_id", $item->id)
            ->where("is_returned", false)
            ->sum("total");

        return view(
            "items.show",
            compact(
                "item",
                "categories",
                "currencies",
                "provinces",
                "employees",
                "departments",
                "submissions",
                "itemDistributed",
                "units",
                "years",
                "months",
                "days"
            )
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        $categories = Category::all();
        $itemCategory = $item->category_id;
        $currencies = Currency::all();
        $itemCurrency = $item->currency_id;
        $units = Unit::all();
        $itemUnit = $item->unit_id;
        $provinces = Province::all();
        $itemProvince = $item->province_id;
        $years = Year::all();
        $itemYear = $item->purchaseYear_id;
        $months = Month::all();
        $itemMonth = $item->purchaseMonth_id;
        $days = Day::all();
        $itemDay = $item->purchaseDay_id;

        return view(
            "items.edit",
            compact(
                "item",
                "categories",
                "itemCategory",
                "currencies",
                "itemCurrency",
                "units",
                "itemUnit",
                "provinces",
                "itemProvince",
                "years",
                "itemYear",
                "months",
                "itemMonth",
                "days",
                "itemDay"
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemRequest $request, $id)
    {
        $item = Item::find($id);
        $item->name = $request->name;
        $item->total = $request->total;
        $item->unit_id = $request->input("unit");
        $item->m7number = $request->input("m7Number");
        $item->details = $request->details;
        $item->in_stock = $request->inStock;
        $item->category_id = $request->input("category");
        $item->purchase_price = $request->purchasePrice;
        $item->currency_id = $request->input("purchasePriceCurrency");
        $item->item_stock_number = $request->itemStockNumber;
        $item->province_id = auth()->user()->province_id;
        $item->purchaseYear_id = $request->input("purchaseYear");
        $item->purchaseMonth_id = $request->input("purchaseMonth");
        $item->purchaseDay_id = $request->input("purchaseDay");

        if ($request->hasFile("itemImages")) {
            $oldFile = "images/items/" . $item->images;

            if (File::exists($oldFile)) {
                File::delete($oldFile);
            }

            $image = $request->file("itemImages");
            $fileName = time() . "_" . $image->getClientOriginalName();
            $image->move(public_path("images/items"), $fileName);
            $item->images = $fileName;
        }

        $item->save();

        Alert::success("د جنس معلومات په بریالیتوب سره سم شول");

        return redirect("stock/items");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);

        // First delete the submissions for this item
        $submissions = Submission::all();

        foreach ($submissions as $submission) {
            if ($submission->item_id == $item->id) {
                $submission->delete();
            }
        }

        // Check if item has images in the database and delete it if yes
        $itemImages = "images/items/" . $item->images;

        if (File::exists($itemImages)) {
            File::delete($itemImages);
        }

        $item->delete();

        Alert::success("جنس په بریالیتوب سره له منځه یوړل شو");

        return redirect("stock/items");
    }
}
