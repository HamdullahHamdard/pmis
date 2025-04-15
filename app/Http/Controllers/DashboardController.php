<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Employee;
use App\Models\Item;
use App\Models\Province;
use App\Models\Submission;
use App\Models\Usable;
use App\Models\User;
use Carbon\Carbon;
use Spatie\Permission\Models\Role as ModelsRole;
use Spatie\Activitylog\Models\Activity;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $totalUsers = User::count("id");
        $totalRoles = ModelsRole::count("id");

        // Get all employees
        $allEmployees = Employee::all();
        // Get total employees. Specific for the province is signed in user is from a province
        $totalEmployees = 0;
        if (auth()->user()->province_id === 13) {
            $totalEmployees = Employee::count("id");
        } else {
            $totalEmployees = Employee::where("province_id", auth()->user()->province_id)->count("id");
        }

        $items = Item::orderBy("id", "DESC")->paginate(5);

        $totalItems = 0;
        if (auth()->user()->province_id === 13) {
            $totalItems = Item::count("id");
        } else {
            $totalItems = Item::where("province_id", auth()->user()->province_id)->count("id");
        }

        // $totalItems = Item::where("province_id", auth()->user()->province_id)->count("id");

        $categories = Category::orderBy("id", "ASC")->paginate(5);

        $currentTime = Carbon::now()->format("g:i A");
        // $currentTime->format('g:i A');
        $kabulTime = Carbon::create(2012, 1, 1, 0, 0, 0, "Asia/Kabul");

        // Afghan Date
        // Date::setLocale("ps");
        // $afghanDate = Date::now()->format("j F Y");

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

        $allActivities = Activity::with('subject', 'causer')->orderBy("id", "DESC")->paginate(20);

        $provinces = Province::all();

        // Submissions based on department
        // $totalCeoOfficeSubmissions = number_format(
        //     Submission::where("department_id", 1)->count("id") +
        //         Submission::where("employee_id", Employee::count("id"))->count(
        //             "id"
        //         ),
        //     0,
        //     " ",
        //     ","
        // );

        // $totalTechnicalDeptSubmissions = number_format(
        //     Submission::where("department_id", 2)->count("id"),
        //     0,
        //     " ",
        //     ","
        // );

        // $totalTvBroadcastingDeptSubmissions = number_format(
        //     Submission::where("department_id", 3)->count("id"),
        //     0,
        //     " ",
        //     ","
        // );

        // $totalRadioBroadcastingDeptSubmissions = number_format(
        //     Submission::where("department_id", 4)->count("id"),
        //     0,
        //     " ",
        //     ","
        // );

        // $totalFinanceDeptSubmissions = number_format(
        //     Submission::where("department_id", 5)->count("id"),
        //     0,
        //     " ",
        //     ","
        // );

        // $totalProductionDeptSubmissions = number_format(
        //     Submission::where("department_id", 6)->count("id"),
        //     0,
        //     " ",
        //     ","
        // );

        // $totalEducationDeptSubmissions = number_format(
        //     Submission::where("department_id", 7)->count("id"),
        //     0,
        //     " ",
        //     ","
        // );

        // $totalTaranumDeptSubmissions = number_format(
        //     Submission::where("department_id", 8)->count("id"),
        //     0,
        //     " ",
        //     ","
        // );

        // $totalDigitalMediaDeptSubmissions = number_format(
        //     Submission::where("department_id", 9)->count("id") +
        //         Submission::where(
        //             "employee_id",
        //             "=",
        //             $allEmployees->get("id")
        //         )->count("id"),
        //     0,
        //     " ",
        //     ","
        // );

        // $totalItDeptSubmissions = number_format(
        //     Submission::where("department_id", 10)->count("id"),
        //     0,
        //     " ",
        //     ","
        // );

        // $totalProvincialDeptSubmissions = number_format(
        //     Submission::where("department_id", 11)->count("id") +
        //         Submission::where(
        //             "employee_id",
        //             "=",
        //             $allEmployees->get("id")
        //         )->count("id"),
        //     0,
        //     " ",
        //     ","
        // );

        // $totalHrDeptSubmissions = number_format(
        //     Submission::where("department_id", 12)->count("id") +
        //         Submission::where(
        //             "employee_id",
        //             "=",
        //             $allEmployees->get("id")
        //         )->count("id"),
        //     0,
        //     " ",
        //     ","
        // );

        // $totalAuditDeptSubmissions = number_format(
        //     Submission::where("department_id", 13)->count("id"),
        //     0,
        //     " ",
        //     ","
        // );

        // $totalCreativeDeptSubmissions = number_format(
        //     Submission::where("department_id", 14)->count("id"),
        //     0,
        //     " ",
        //     ","
        // );

        // $totalPlanDeptSubmissions = number_format(
        //     Submission::where("department_id", 15)->count("id"),
        //     0,
        //     " ",
        //     ","
        // );

        // $totalMarketingDeptSubmissions = number_format(
        //     Submission::where("department_id", 16)->count("id"),
        //     0,
        //     " ",
        //     ","
        // );

        return view(
            "dashboard",
            compact(
                "users",
                "totalUsers",
                "totalRoles",
                "totalEmployees",
                "currentTime",
                "items",
                "totalItems",
                "categories",
                // "afghanDate",
                "kabulTime",
                // Items Counts
                "totalItItems",
                "totalOfficeItems",
                "totalTechnicalItems",
                "totalBroadcastingItems",
                "totalDigitalMediaItems",
                "totalUsedItems",
                "allActivities",
                "provinces",
                // Submissions Counts
                // "totalCeoOfficeSubmissions",
                // "totalTechnicalDeptSubmissions",
                // "totalTvBroadcastingDeptSubmissions",
                // "totalRadioBroadcastingDeptSubmissions",
                // "totalFinanceDeptSubmissions",
                // "totalProductionDeptSubmissions",
                // "totalEducationDeptSubmissions",
                // "totalTaranumDeptSubmissions",
                // "totalDigitalMediaDeptSubmissions",
                // "totalItDeptSubmissions",
                // "totalProvincialDeptSubmissions",
                // "totalHrDeptSubmissions",
                // "totalAuditDeptSubmissions",
                // "totalCreativeDeptSubmissions",
                // "totalPlanDeptSubmissions",
                // "totalMarketingDeptSubmissions"
            )
        );
    }
}
