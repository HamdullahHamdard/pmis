<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Currency;
use App\Models\Employee;
use App\Models\EmployeeShift;
use App\Models\EmployeeType;
use App\Models\Item;
use App\Models\Submission;
use App\Models\Unit;
use App\Models\Usable;
use App\Models\UsableType;
use App\Models\Year;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Total Employees Registered
        $totalEmployees = 0;

        if (auth()->user()->province_id === 13) {
            $totalEmployees = Employee::count("id");
        } else {
            $totalEmployees = Employee::where("province_id", auth()->user()->province_id)->count("id");
        }

        // Total Employees Types
        $totalEmployeeTypes = number_format(
            EmployeeType::count("id"),
            0,
            " ",
            ","
        );

        // Total Employees Working Shifts
        $totalEmployeeShifts = number_format(
            EmployeeShift::count("id"),
            0,
            " ",
            ","
        );

        // Total Categories in Stock
        $totalCategories = number_format(Category::count("id"), 0, " ", ",");

        // Total Currencies in Stock
        $totalCurrencies = number_format(Currency::count("id"), 0, " ", ",");

        // Total Units in Stock
        $totalUnits = number_format(Unit::count("id"), 0, " ", ",");

        // Total Years
        $totalYears = number_format(Year::count("id"), 0, " ", ",");

        // Total Items
        $totalItems = 0;

        if (auth()->user()->province_id === 13) {
            $totalItems = number_format(Item::count("id"), 0, " ", ",");
        } else {
            $totalItems = number_format(Item::where("province_id", auth()->user()->province_id)->count("id"), 0, " ", ",");
        }

        // Total Registered Items
        $totalItemsInRTA = 0;

        if (auth()->user()->province_id === 13) {
            $totalItemsInRTA = number_format(Item::sum("total"), 0, " ", ",");
        } else {
            $totalItemsInRTA = number_format(Item::where("province_id", auth()->user()->province_id)->sum("total"), 0, " ", ",");
        }

        // Total Items Available in Stock
        $totalAvailableItems = 0;

        if (auth()->user()->province_id === 13) {
            $totalAvailableItems = number_format(
                Item::sum("total") -
                Submission::where("is_returned", false)->sum("total"),
                0,
                " ",
                ","
            );
        } else {
            $totalAvailableItems = number_format(
                Item::where("province_id", auth()->user()->province_id)->sum("total") -
                Submission::where("is_returned", false)->where("province_id", auth()->user()->province_id)->sum("total"), 0, " ", ",");
        }

        // Total Items Distributed
        $totalDistributedItems = 0;

        if (auth()->user()->province_id === 13) {
            $totalDistributedItems = number_format(
                Submission::where("is_returned", false)->sum("total"),
                0,
                " ",
                ","
            );
        } else {
            $totalDistributedItems = number_format(
                Submission::where("is_returned", false)->where("province_id", auth()->user()->province_id)->sum("total"), 0, " ", ",");
        }

        // Total Items Purchased in AFN
        $totalItemsInAfn = 0;

        if (auth()->user()->province_id === 13) {
            $totalItemsInAfn = number_format(
                Item::where("currency_id", 1)->sum("total"),
                0,
                " ",
                ","
            );
        } else {
            $totalItemsInAfn = number_format(Item::where("province_id", auth()->user()->province_id)->where("currency_id", 1)->sum("total"),
                0,
                " ",
                ","
            );
        }

        $totalItemsInAfnForValue = 0;

        if (auth()->user()->province_id === 13) {
            $totalItemsInAfnForValue =  Item::where("currency_id",'=', 1)->get();
        } else {
            $totalItemsInAfnForValue = Item::where("province_id",'=', auth()->user()->province_id)->where("currency_id", '=',1)->get();
        }

        // dd($totalItemsInAfnForValue);

        // Total Items Purchased in USD
        $totalItemsInUsd = 0;

        if (auth()->user()->province_id === 13) {
            $totalItemsInUsd = number_format(
                Item::where("currency_id", 2)->sum("total"),
                0,
                " ",
                ","
            );
        } else {
            $totalItemsInUsd = number_format(Item::where("province_id", auth()->user()->province_id)->where("currency_id", 2)->sum("total"),
                0,
                " ",
                ","
            );
        }

        $totalItemsInUsdForValue = 0;

        if (auth()->user()->province_id === 13) {
            $totalItemsInUsdForValue = Item::where("currency_id", 2)->get();
        } else {
            $totalItemsInUsdForValue = Item::where("province_id", auth()->user()->province_id)->where("currency_id", 2)->get();
        }

        // Total Usable Items Types
        $totalUsableItemsTypes = number_format(
            UsableType::count("id"),
            0,
            " ",
            ","
        );

        // Items based on categories
        $totalItItems = 0;
        if (auth()->user()->province_id === 13) {
            $totalItItems = Item::where("category_id", 1)->count("id");
        } else {
            $totalItItems = Item::where("province_id", auth()->user()->province_id)->where("category_id", 1)->count("id");
        }

        $totalOfficeItems = 0;
        if (auth()->user()->province_id === 13) {
            $totalOfficeItems = Item::where("category_id", 2)->count("id");
        } else {
            $totalOfficeItems = Item::where("province_id", auth()->user()->province_id)->where("category_id", 2)->count("id");
        }

        $totalTechnicalItems = 0;
        if (auth()->user()->province_id === 13) {
            $totalTechnicalItems = Item::where("category_id", 3)->count("id");
        } else {
            $totalTechnicalItems = Item::where("province_id", auth()->user()->province_id)->where("category_id", 3)->count("id");
        }

        $totalBroadcastingItems = 0;
        if (auth()->user()->province_id === 13) {
            $totalBroadcastingItems = Item::where("category_id", 4)->count("id");
        } else {
            $totalBroadcastingItems = Item::where("province_id", auth()->user()->province_id)->where("category_id", 4)->count("id");
        }

        $totalDigitalMediaItems = 0;
        if (auth()->user()->province_id === 13) {
            $totalDigitalMediaItems = Item::where("category_id", 5)->count("id");
        } else {
            $totalDigitalMediaItems = Item::where("province_id", auth()->user()->province_id)->where("category_id", 5)->count("id");
        }

        $totalUsedItems = number_format(Usable::count("id"), 0, " ", ",");

        return view(
            "stock.index",
            compact(
                "totalEmployees",
                "totalEmployeeTypes",
                "totalEmployeeShifts",
                "totalCategories",
                "totalCurrencies",
                "totalUnits",
                "totalYears",
                "totalItems",
                "totalItemsInRTA",
                "totalAvailableItems",
                "totalDistributedItems",
                "totalItemsInAfn",
                "totalItemsInAfnForValue",
                "totalItemsInUsd",
                "totalItemsInUsdForValue",
                "totalUsableItemsTypes",
                "totalItItems",
                "totalOfficeItems",
                "totalTechnicalItems",
                "totalBroadcastingItems",
                "totalDigitalMediaItems",
                "totalUsedItems"
            )
        );
    }
}
