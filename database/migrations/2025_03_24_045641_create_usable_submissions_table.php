<?php

use App\Models\Department;
use App\Models\Item;
use App\Models\Province;
use App\Models\UsableType;
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
        Schema::create('usable_submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Province::class);
            $table->foreignIdFor(Department::class);
            $table->foreignIdFor(Item::class);
            $table->foreignIdFor(UsableType::class);
            $table->string("total");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usable_submissions');
    }
};
