<?php

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
            $table->string('trusted');
            $table->string('price');
            $table->unsignedBigInteger("purchaseYear_id");
            $table->unsignedBigInteger("purchaseMonth_id");
            $table->unsignedBigInteger("purchaseDay_id");

            $table->foreign("purchaseDay_id")->references("id")->on("days")->onDelete("cascade");
            $table->foreign("purchaseMonth_id")->references("id")->on("months")->onDelete("cascade");
            $table->foreign("purchaseYear_id")->references("id")->on("years")->onDelete("cascade");
            $table->timestamps();
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
