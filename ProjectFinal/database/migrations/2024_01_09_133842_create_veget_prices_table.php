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
        Schema::create('veget_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained();
            $table->date('vegetprice_date')->comment('วันที่นำเข้า');
            $table->string('vegetprice_veget')->comment('ประเภทผัก');
            $table->string('vegetprice_quantity')->comment('จำนวนถุง');
            $table->float('vegetprice_weight')->comment('น้ำหนัก');
            $table->integer('vegetprice_price')->comment('ราคา');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rice_prices');
    }
};
