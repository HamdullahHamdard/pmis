<?php

use App\Models\Employee;
use App\Models\Item;
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
        Schema::create('form8_submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Item::class);
            $table->foreignIdFor(Employee::class);
            $table->string('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form8_submissions');
    }
};
