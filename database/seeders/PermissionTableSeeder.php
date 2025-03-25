<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            // Roles
            "view-roles",
            "create-roles",
            "edit-roles",
            "delete-roles",

            // User
            "view-users",
            "create-users",
            "edit-users",
            "delete-users",

            // Dashboard
            "view-dashboardCalcs",

            // Stock
            "view-stock",

            // Stock Items
            "view-items",
            "create-items",
            "edit-items",
            "delete-items",

            // Item Submissions
            "view-submission",
            "create-submission",
            "edit-submission",
            "delete-submission",

            // Categories
            "view-categories",
            "create-categories",
            "edit-categories",
            "delete-categories",

            // Employees
            "view-employees",
            "create-employees",
            "edit-employees",
            "delete-employees",

            // Employee Types
            "view-employeeTypes",
            "create-employeeTypes",
            "edit-employeeTypes",
            "delete-employeeTypes",

            // Employee Shifts
            "view-employeeShifts",
            "create-employeeShifts",
            "edit-employeeShifts",
            "delete-employeeShifts",

            // Currency
            "view-currencies",
            "create-currencies",
            "edit-currencies",
            "delete-currencies",

            // Currency
            "view-units",
            "create-units",
            "edit-units",
            "delete-units",

            // Usables
            "view-usables",
            "create-usables",
            "edit-usables",
            "delete-usables",

            // Usable Types
            "view-usableTypes",
            "create-usableTypes",
            "edit-usableTypes",
            "delete-usableTypes",

            // Usable Submissions
            "view-usableSubmission",
            "create-usableSubmission",
            "edit-usableSubmission",
            "delete-usableSubmission",

            // Years
            "view-years",
            "create-years",
            "edit-years",
            "delete-years",

            // Months
            "view-months",
            "create-months",
            "edit-months",
            "delete-months",

            // Months
            "view-days",
            "create-days",
            "edit-days",
            "delete-days",
        ];

        foreach ($permissions as $permission) {
            Permission::create(["name" => $permission]);
        }
    }
}
