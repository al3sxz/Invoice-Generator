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
        Schema::table('invoices', function (Blueprint $table) {
            $table->decimal('tax_value', 10, 2)->change();
            $table->decimal('final_value', 10, 2)->change();
        });
         Schema::table('invoice_service', function (Blueprint $table) {
         $table->decimal('unit_price', 10, 2)->change();
    });
    }

    public function down(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->integer('tax_value')->change();
            $table->integer('final_value')->change();
        });
    }
};
