<?php

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
        Schema::create('form5s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("form9s_id");
            $table->foreignIdFor(Province::class);
            $table->string('distribution_warehouse');
            $table->string('distribution_date');
            $table->longText("details")->nullable();
            $table->foreign('form9s_id')->references('id')->on('form9s')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form5s');
    }
};
