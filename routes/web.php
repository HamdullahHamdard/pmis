<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DayController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeShiftController;
use App\Http\Controllers\EmployeeTypeController;
use App\Http\Controllers\Form7Controller;
use App\Http\Controllers\Form8Controller;
use App\Http\Controllers\Form9Controller;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\MonthController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UsableController;
use App\Http\Controllers\UsableSubmissionController;
use App\Http\Controllers\UsableTypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\YearController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Form5Controller;
use App\Http\Controllers\Form5SubmissionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get("/mail", function () {
//     Mail::to('hamdullahhamdardhelmandi@gmail.com')->send(new HelloMail());
// })->middleware(["auth"])
// ->name("mail");


// Login
Route::get("/", function () {
    return redirect("/login");
});

// Dashboard
Route::get("/dashboard", [DashboardController::class, "index"])
    ->middleware(["auth"])
    ->name("dashboard");

// Protected Routes
Route::middleware("auth")->group(function () {
    // Users
    Route::get("/users", [UserController::class, "index"])->name("users");
    Route::get("users/create", [UserController::class, "create"])->name(
        "users.create"
    );
    Route::post("/users/store", [UserController::class, "store"])->name(
        "users.store"
    );
    Route::get("/users/edit/{id}", [UserController::class, "edit"])->name(
        "users.edit"
    );
    Route::put("/users/update/{id}", [UserController::class, "update"])->name(
        "users.update"
    );
    Route::get("/users/delete/{id}", [UserController::class, "destroy"])->name(
        "users.destroy"
    );

    // Profile
    Route::get("/profile", [ProfileController::class, "edit"])->name(
        "profile.edit"
    );
    Route::patch("/profile", [ProfileController::class, "update"])->name(
        "profile.update"
    );
    Route::delete("/profile", [ProfileController::class, "destroy"])->name(
        "profile.destroy"
    );

    // Roles
    Route::get("/roles", [RoleController::class, "index"])->name("roles");
    Route::get("/roles/create", [RoleController::class, "create"])->name(
        "roles.create"
    );
    Route::post("/roles/store", [RoleController::class, "store"])->name(
        "roles.store"
    );
    Route::get("/roles/edit/{id}", [RoleController::class, "edit"])->name(
        "roles.edit"
    );
    Route::put("/roles/update/{id}", [RoleController::class, "update"])->name(
        "roles.update"
    );
    Route::get("/roles/delete/{id}", [RoleController::class, "destroy"])->name(
        "roles.destroy"
    );

    // Stock
    Route::get("/stock", [StockController::class, "index"])->name("stock");

    // Departments
    Route::get("/stock/departments", [
        DepartmentController::class,
        "index",
    ])->name("departments");
    Route::get("/stock/departments/create", [
        DepartmentController::class,
        "create",
    ])->name("departments.create");
    Route::post("/stock/departments/store", [
        DepartmentController::class,
        "store",
    ])->name("departments.store");
    Route::get("/stock/departments/edit/{id}", [
        DepartmentController::class,
        "edit",
    ])->name("departments.edit");
    Route::put("/stock/departments/update/{id}", [
        DepartmentController::class,
        "update",
    ])->name("departments.update");
    Route::get("/stock/departments/delete/{id}", [
        DepartmentController::class,
        "destroy",
    ])->name("departments.destroy");

    // Categories
    Route::get("/stock/categories", [CategoryController::class, "index"])->name(
        "categories"
    );
    Route::get("/stock/categories/create", [
        CategoryController::class,
        "create",
    ])->name("categories.create");
    Route::post("/stock/categories/store", [
        CategoryController::class,
        "store",
    ])->name("categories.store");
    Route::get("/stock/categories/edit/{id}", [
        CategoryController::class,
        "edit",
    ])->name("categories.edit");
    Route::put("/stock/categories/update/{id}", [
        CategoryController::class,
        "update",
    ])->name("categories.update");
    Route::get("/stock/categories/delete/{id}", [
        CategoryController::class,
        "destroy",
    ])->name("categories.destroy");

    // Items
    Route::get("/stock/items", [ItemController::class, "index"])->name("items");
    Route::get("/stock/items/create", [ItemController::class, "create"])->name(
        "items.create"
    );
    Route::post("/stock/items/store", [ItemController::class, "store"])->name(
        "items.store"
    );
    Route::get("/stock/items/edit/{id}", [ItemController::class, "edit"])->name(
        "items.edit"
    );
    Route::get("/stock/items/show/{id}", [ItemController::class, "show"])->name(
        "items.show"
    );
    Route::put("/stock/items/update/{id}", [
        ItemController::class,
        "update",
    ])->name("items.update");
    Route::get("/stock/items/delete/{id}", [
        ItemController::class,
        "destroy",
    ])->name("items.destroy");
    Route::get("/stock/items/download/{id}", [
        ItemController::class,
        "download",
    ])->name("items.download");

    // Items Submission
    Route::get("/stock/submission", [
        SubmissionController::class,
        "index",
    ])->name("submission");
    Route::get("/stock/submission/create", [
        SubmissionController::class,
        "create",
    ])->name("submission.create");
    Route::post("/stock/submission/store", [
        SubmissionController::class,
        "store",
    ])->name("submission.store");
    Route::get("/stock/submission/edit/{id}", [
        SubmissionController::class,
        "edit",
    ])->name("submission.edit");
    Route::get("/stock/submission/show/{id}", [
        SubmissionController::class,
        "show",
    ])->name("submission.show");
    Route::put("/stock/submission/update/{id}", [
        SubmissionController::class,
        "update",
    ])->name("submission.update");
    Route::get("/stock/submission/delete/{id}", [
        SubmissionController::class,
        "destroy",
    ])->name("submission.destroy");
    Route::get("/stock/submission/search", [
        SubmissionController::class,
        "search",
    ])->name("submission.search");

    // Employees
    Route::get("/employees", [EmployeeController::class, "index"])->name(
        "employees"
    );
    Route::get("/employees/create", [
        EmployeeController::class,
        "create",
    ])->name("employees.create");
    Route::post("/employees/store", [EmployeeController::class, "store"])->name(
        "employees.store"
    );
    Route::get("/employees/edit/{id}", [
        EmployeeController::class,
        "edit",
    ])->name("employees.edit");
    Route::get("/employees/show/{id}", [
        EmployeeController::class,
        "show",
    ])->name("employees.show");
    Route::put("/employees/update/{id}", [
        EmployeeController::class,
        "update",
    ])->name("employees.update");
    Route::get("/employees/delete/{id}", [
        EmployeeController::class,
        "destroy",
    ])->name("employees.destroy");

    // Employee types
    Route::get("/employee/types", [
        EmployeeTypeController::class,
        "index",
    ])->name("empTypes");
    Route::get("/employee/types/create", [
        EmployeeTypeController::class,
        "create",
    ])->name("empTypes.create");
    Route::post("/employee/types/store", [
        EmployeeTypeController::class,
        "store",
    ])->name("empTypes.store");
    Route::get("/employee/types/edit/{id}", [
        EmployeeTypeController::class,
        "edit",
    ])->name("empTypes.edit");
    Route::get("/employee/types/show/{id}", [
        EmployeeTypeController::class,
        "show",
    ])->name("empTypes.show");
    Route::put("/employee/types/update/{id}", [
        EmployeeTypeController::class,
        "update",
    ])->name("empTypes.update");
    Route::get("/employee/types/delete/{id}", [
        EmployeeTypeController::class,
        "destroy",
    ])->name("empTypes.destroy");

    // Employee shifts
    Route::get("/employee/shifts", [
        EmployeeShiftController::class,
        "index",
    ])->name("empShifts");
    Route::get("/employee/shifts/create", [
        EmployeeShiftController::class,
        "create",
    ])->name("empShifts.create");
    Route::post("/employee/shifts/store", [
        EmployeeShiftController::class,
        "store",
    ])->name("empShifts.store");
    Route::get("/employee/shifts/edit/{id}", [
        EmployeeShiftController::class,
        "edit",
    ])->name("empShifts.edit");
    Route::get("/employee/shifts/show/{id}", [
        EmployeeShiftController::class,
        "show",
    ])->name("empShifts.show");
    Route::put("/employee/shifts/update/{id}", [
        EmployeeShiftController::class,
        "update",
    ])->name("empShifts.update");
    Route::get("/employee/shifts/delete/{id}", [
        EmployeeShiftController::class,
        "destroy",
    ])->name("empShifts.destroy");

    // Usable
    Route::get("/stock/usables", [UsableController::class, "index"])->name(
        "usables"
    );
    Route::get("/stock/usables/create", [
        UsableController::class,
        "create",
    ])->name("usables.create");
    Route::post("/stock/usables/store", [
        UsableController::class,
        "store",
    ])->name("usables.store");
    Route::get("/stock/usables/edit/{id}", [
        UsableController::class,
        "edit",
    ])->name("usables.edit");
    Route::get("/stock/usables/show/{id}", [
        UsableController::class,
        "show",
    ])->name("usables.show");
    Route::put("/stock/usables/update/{id}", [
        UsableController::class,
        "update",
    ])->name("usables.update");
    Route::get("/stock/usables/delete/{id}", [
        UsableController::class,
        "destroy",
    ])->name("usables.destroy");
    Route::get("/stock/usables/download/{id}", [
        UsableController::class,
        "download",
    ]);

    // Usable types
    Route::get("/stock/usables/types", [
        UsableTypeController::class,
        "index",
    ])->name("usableTypes");
    Route::get("/stock/usables/types/create", [
        UsableTypeController::class,
        "create",
    ])->name("usableTypes.create");
    Route::post("/stock/usables/types/store", [
        UsableTypeController::class,
        "store",
    ])->name("usableTypes.store");
    Route::get("/stock/usables/types/edit/{id}", [
        UsableTypeController::class,
        "edit",
    ])->name("usableTypes.edit");
    Route::get("/stock/usables/types/show/{id}", [
        UsableTypeController::class,
        "show",
    ])->name("usableTypes.show");
    Route::put("/stock/usables/types/update/{id}", [
        UsableTypeController::class,
        "update",
    ])->name("usableTypes.update");
    Route::get("/stock/usables/types/delete/{id}", [
        UsableTypeController::class,
        "destroy",
    ])->name("usableTypes.destroy");

    // Usable Submission
    Route::get("/stock/usable/submission", [
        UsableSubmissionController::class,
        "index",
    ])->name("usableSubmission");
    Route::get("/stock/usable/submission/create", [
        UsableSubmissionController::class,
        "create",
    ])->name("usableSubmission.create");
    Route::post("/stock/usable/submission/store", [
        UsableSubmissionController::class,
        "store",
    ])->name("usableSubmission.store");
    Route::get("/stock/usable/submission/edit/{id}", [
        UsableSubmissionController::class,
        "edit",
    ])->name("usableSubmission.edit");
    Route::get("/stock/usable/submission/show/{id}", [
        UsableSubmissionController::class,
        "show",
    ])->name("usableSubmission.show");
    Route::put("/stock/usable/submission/update/{id}", [
        UsableSubmissionController::class,
        "update",
    ])->name("usableSubmission.update");
    Route::get("/stock/usable/submission/delete/{id}", [
        UsableSubmissionController::class,
        "destroy",
    ])->name("usableSubmission.destroy");
    Route::get("/stock/usable/submission/search", [
        UsableSubmissionController::class,
        "search",
    ])->name("usableSubmission.search");

    // Reports
    Route::get("/reports", [ReportsController::class, "index"])->name(
        "reports"
    );

    // Currency
    Route::get("/stock/currency", [CurrencyController::class, "index"])->name(
        "currency"
    );
    Route::get("/stock/currency/create", [
        CurrencyController::class,
        "create",
    ])->name("currency.create");
    Route::post("/stock/currency/store", [
        CurrencyController::class,
        "store",
    ])->name("currency.store");
    Route::get("/stock/currency/edit/{id}", [
        CurrencyController::class,
        "edit",
    ])->name("currency.edit");
    Route::put("/stock/currency/update/{id}", [
        CurrencyController::class,
        "update",
    ])->name("currency.update");
    Route::get("/stock/currency/delete/{id}", [
        CurrencyController::class,
        "destroy",
    ])->name("currency.destroy");

    // Units
    Route::get("/stock/units", [UnitController::class, "index"])->name("units");
    Route::get("/stock/units/create", [UnitController::class, "create"])->name(
        "units.create"
    );
    Route::post("/stock/units/store", [UnitController::class, "store"])->name(
        "units.store"
    );
    Route::get("/stock/units/edit/{id}", [UnitController::class, "edit"])->name(
        "units.edit"
    );
    Route::put("/stock/units/update/{id}", [
        UnitController::class,
        "update",
    ])->name("units.update");
    Route::get("/stock/units/delete/{id}", [
        UnitController::class,
        "destroy",
    ])->name("units.destroy");

    // Settings
    Route::get("/settings", [SettingController::class, "index"])->name(
        "settings"
    );
    Route::get('/download-backup', [SettingController::class, 'downloadBackup'])->name('backup.database');
    Route::get('/get-backup', [SettingController::class, 'getBackup'])->name('getBackup.database');
    Route::get('/delete-backup', [SettingController::class, 'deleteBackup'])->name('deleteBackup.database');


    // Years
    Route::get("/settings/years", [YearController::class, "index"])->name(
        "years"
    );
    Route::get("/settings/years/create", [
        YearController::class,
        "create",
    ])->name("years.create");
    Route::post("/settings/years/store", [YearController::class, "store"])->name(
        "years.store"
    );
    Route::get("/settings/years/edit/{id}", [
        YearController::class,
        "edit",
    ])->name("years.edit");
    Route::get("/settings/years/show/{id}", [
        YearController::class,
        "show",
    ])->name("years.show");
    Route::put("/settings/years/update/{id}", [
        YearController::class,
        "update",
    ])->name("years.update");
    Route::get("/settings/years/delete/{id}", [
        YearController::class,
        "destroy",
    ])->name("years.destroy");

    // Months
    Route::get("/settings/months", [MonthController::class, "index"])->name(
        "months"
    );
    Route::get("/settings/months/create", [
        MonthController::class,
        "create",
    ])->name("months.create");
    Route::post("/settings/months/store", [MonthController::class, "store"])->name(
        "months.store"
    );
    Route::get("/settings/months/edit/{id}", [
        MonthController::class,
        "edit",
    ])->name("months.edit");
    Route::get("/settings/months/show/{id}", [
        MonthController::class,
        "show",
    ])->name("months.show");
    Route::put("/settings/months/update/{id}", [
        MonthController::class,
        "update",
    ])->name("months.update");
    Route::get("/settings/months/delete/{id}", [
        MonthController::class,
        "destroy",
    ])->name("months.destroy");

    // Days
    Route::get("/settings/days", [DayController::class, "index"])->name(
        "days"
    );
    Route::get("/settings/days/create", [
        DayController::class,
        "create",
    ])->name("days.create");
    Route::post("/settings/days/store", [DayController::class, "store"])->name(
        "days.store"
    );
    Route::get("/settings/days/edit/{id}", [
        DayController::class,
        "edit",
    ])->name("days.edit");
    Route::get("/settings/days/show/{id}", [
        DayController::class,
        "show",
    ])->name("days.show");
    Route::put("/settings/days/update/{id}", [
        DayController::class,
        "update",
    ])->name("days.update");
    Route::get("/settings/days/delete/{id}", [
        DayController::class,
        "destroy",
    ])->name("days.destroy");



        // Form 5 Items

        Route::get("/formSubmission/{id}", [
            Form5SubmissionController::class,
            "index",
        ]);

        Route::get("/formSubmission/create/{id}", [
            Form5SubmissionController::class,
            "create",
        ]);

        Route::post("/formSubmission/store/{id}", [
            Form5SubmissionController::class,
            "store",
        ]);
        Route::put("/formSubmission/update/{id}/{form5_id}", [
            Form5SubmissionController::class,
            "update",
        ]);
        Route::get("/formSubmission/edit/{formItemsId}/{id}", [
            Form5SubmissionController::class,
            "edit",
        ]);
        Route::delete("/formSubmission/delete/{id}", [
            Form5SubmissionController::class,
            "destroy",
        ]);
    });


    Route::group(['middleware' => ['auth']], function() {
        Route::resource('form9s', Form9Controller::class);
        Route::resource('form5s', Form5Controller::class);
        // Form8 routes
    Route::get('form8s', [Form8Controller::class, 'index'])->name('form8s.index');
    Route::get('form8s/create', [Form8Controller::class, 'create'])->name('form8s.create');
    Route::post('form8s/select-form', [Form8Controller::class, 'selectForm'])->name('form8s.select-form');
    Route::get('form8s/select-items', [Form8Controller::class, 'selectItems'])->name('form8s.select-items');
    Route::post('form8s/select-items', [Form8Controller::class, 'processItemSelection'])->name('form8s.select-items');
    Route::get('form8s/add-details', [Form8Controller::class, 'addDetails'])->name('form8s.add-details');
    Route::post('form8s', [Form8Controller::class, 'store'])->name('form8s.store');



    });

require __DIR__ . "/auth.php";
