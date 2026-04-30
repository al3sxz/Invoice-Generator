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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string("invoice_number");
            $table->foreignId("client_id")->constrained();
            $table->date("expiration_date");
            $table->enum("status", ["PENDING", "PAID", "CANCELED", "OVERDUE", "DRAFT"]);
            $table->string("notes")->nullable();
            $table->decimal('sub_total', 10, 2);
            $table->decimal('tax_value', 10, 2);
            $table->decimal('final_value', 10, 2);
            $table->integer("tax_percentage");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
