<?php

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('form9s', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Department::class);
            $table->foreignIdFor(Employee::class);
            $table->unsignedBigInteger("form9s_number");
            $table->string("requested_management")->nullable();
            $table->longText("form_date");
            $table->string("first_details")->nullable();
            $table->string("second_details")->nullable();
            $table->string("manager_name")->nullable();
            $table->string("item_name")->nullable();
            $table->boolean("is_accepted")->default(false);
            $table->boolean("status")->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form9s');
    }
};
