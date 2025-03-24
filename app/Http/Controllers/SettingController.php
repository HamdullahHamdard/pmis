<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Employee;
use App\Models\EmployeeShift;
use App\Models\EmployeeType;
use App\Models\Month;
use App\Models\User;
use App\Models\Year;
use Spatie\Permission\Models\Role as ModelsRole;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Process;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function index()
    {
        // Total Employees Registered
        $totalEmployees = 0;

        if (auth()->user()->province_id === 13) {
            $totalEmployees = Employee::count("id");
        } else {
            $totalEmployees = Employee::where("province_id", auth()->user()->province_id)->count("id");
        }

        $totalEmployeeTypes = EmployeeType::count("id");
        $totalEmployeeShifts = EmployeeShift::count("id");
        $totalRoles = ModelsRole::count("id");
        $totalUsers = User::count("id");
        $totalYears = Year::count("id");
        $totalMonths = Month::count("id");
        $totalDays = Day::count("id");

        return view(
            "settings.index",
            compact(
                "totalEmployees",
                "totalEmployeeTypes",
                "totalEmployeeShifts",
                "totalRoles",
                "totalUsers",
                "totalYears",
                "totalMonths",
                "totalDays"
            )
        );
    }

    public function getBackup()
    {
        $command = ['php', 'artisan', 'backup:run'];
        $process = new Process($command, base_path());

        $process->mustRun();

        Alert::success("بیک اپ په بریالی توګه سره واخیستل شو");

        return redirect()->back();
    }
    public function downloadBackup()
    {

        $file = 'app/' . last(Storage::files('PMIS'));

        // if(File::exists($file)){
            return response()->download(storage_path($file));
        // }
        // else{
        //     dd(storage_path($file));
        //     return redirect('settings');
        // }

    }

    public function deleteBackup()
    {

        $command = ['php', 'artisan', 'backup:clean'];
        $process = new Process($command, base_path());

        $process->mustRun();

        $directory = storage_path('app/PMIS');

        // Get all files in the directory
        $files = File::files($directory);

        // Loop through the files and delete each one
        foreach ($files as $file) {
            File::delete($file);
        }

        Alert::success("ټوله بیک اپ په بریالی توګه سره ډیلیټ شو");
        return redirect('settings');
    }
}
