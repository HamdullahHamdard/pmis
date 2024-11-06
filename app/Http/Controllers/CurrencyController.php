<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware(
            "permission:view-currencies|create-currencies|edit-currencies|delete-currencies",
            ["only" => ["index", "store"]]
        );
        $this->middleware("permission:create-currencies", [
            "only" => ["create", "store"],
        ]);
        $this->middleware("permission:edit-currencies", [
            "only" => ["edit", "update"],
        ]);
        $this->middleware("permission:delete-currencies", [
            "only" => ["destroy"],
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $currencies = Currency::orderBy("id", "ASC")->paginate(5);
        return view("currency.index", compact("currencies"))->with(
            "i",
            ($request->input("page", 1) - 1) * 5
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("currency.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Currency::create(["name" => $request->input("name")]);

        Alert::success("واحد پولی جدید موفقانه اضافه گردید");

        return redirect("stock/currency");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $currency = Currency::find($id);
        return view("currency.show", compact("currency"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $currency = Currency::find($id);

        return view("currency.edit", compact("currency"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $currency = Currency::find($id);
        $currency->name = $request->name;

        $currency->save();

        Alert::success("معلومات واحد پولی موفقانه تغیر داده شد");

        return redirect("stock/currency");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Currency::find($id)->delete();

        Alert::success("واحد پولی موفقانه از سیستم پاک گردید");

        return redirect("stock/currency");
    }
}
