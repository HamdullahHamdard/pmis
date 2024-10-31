<?php

use App\Models\Currency;
use App\Models\Province;
use App\Models\Unit;
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
        Schema::create('usables', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(UsableType::class);
            $table->foreignIdFor(Unit::class);
            $table->foreignIdFor(Currency::class);
            $table->foreignIdFor(Province::class);
            $table->string('name');
            $table->string("details");
            $table->integer("total");
            $table->string("unit_price");
            $table->string("total_price");
            $table->unsignedInteger("purchaseYear_id")->nullable();
            $table->unsignedInteger("purchaseMonth_id")->nullable();
            $table->unsignedInteger("purchaseDay_id")->nullable();
            $table->timestamps();

            $table->foreign("purchaseYear_id")
                ->references("id")
                ->on("years");

            $table->foreign("purchaseMonth_id")
                ->references("id")
                ->on("months");

            $table->foreign("purchaseDay_id")
                ->references("id")
                ->on("days");

            $table->foreign("province_id")
                ->references("id")
                ->on("provinces");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usables');
    }
};
