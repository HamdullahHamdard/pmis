<?php

use App\Models\EmployeeShift;
use App\Models\EmployeeType;
use App\Models\Province;
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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Province::class);
            $table->foreignIdFor(EmployeeShift::class);
            $table->foreignIdFor(EmployeeType::class);
            $table->string("name");
            $table->string('father_name')->nullable();
            $table->string("employment_id");
            $table->string("position");
            $table->string("contact");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
