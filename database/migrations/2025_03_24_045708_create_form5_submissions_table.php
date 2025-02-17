<?php

use App\Models\Form5;
use App\Models\Submission;
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
        Schema::create('form5_submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Form5::class);
            $table->foreignIdFor(Submission::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form5_submissions');
    }
};
