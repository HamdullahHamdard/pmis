<?php

use App\Models\Form5;
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
        Schema::create('form8s', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Form5::class);
            $table->foreignIdFor(Province::class);
            $table->string('form8_number');
            $table->string('trusted');
            $table->unsignedInteger("purchaseYear_id")->nullable();
            $table->unsignedInteger("purchaseMonth_id")->nullable();
            $table->unsignedInteger("purchaseDay_id")->nullable();

            $table->foreign("purchaseDay_id")->references("id")->on("days");
            $table->foreign("purchaseMonth_id")->references("id")->on("months");
            $table->foreign("purchaseYear_id")->references("id")->on("years");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form8s');
    }
};
