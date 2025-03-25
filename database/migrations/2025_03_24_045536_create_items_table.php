<?php

use App\Models\Category;
use App\Models\Currency;
use App\Models\Province;
use App\Models\Unit;
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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Unit::class);
            $table->foreignIdFor(Category::class);
            $table->foreignIdFor(Currency::class);
            $table->foreignIdFor(Province::class);
            $table->string("name");
            $table->integer("total");
            $table->string("details");
            $table->integer("in_stock");
            $table->string("purchase_price");
            $table->string("item_stock_number");
            $table->string("images");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
