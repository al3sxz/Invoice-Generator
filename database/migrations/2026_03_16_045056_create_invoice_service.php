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
        Schema::create('invoice_service', function (Blueprint $table) {
            $table->id();
            $table->foreignId("service_id")->constrained();
            $table->foreignId("invoice_id")->constrained();
            $table->text("notes")->nullable();
            $table->integer("quantity");
            $table->unsignedInteger("unit_price");
            $table->decimal('sub_total', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_service');
    }
};
