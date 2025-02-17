<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            "name" => "حمدالله همدرد",
            "email" => "admin@email.com",
            "password" => Hash::make("password"),
            "province_id" => 13,
            "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
        ]);

        $role = Role::create(["name" => "Admin"]);

        $permissions = Permission::pluck("id", "id")->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
