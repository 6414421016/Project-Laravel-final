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
        Schema::create('save_money', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained();
            $table->foreignId('veget_date_id')->nullable()->constrained();   //-> มีการเปลี่ยน veget_pveget_id เป็น vegetdate_id
            $table->foreignId('veget_price_id')->nullable()->constrained();  //->เพิ่มล่าสุด
            $table->string('savemoney_bagc')->comment('ราคาตลาด');
            $table->string('savemoney_type')->comment('วิธีชำระเงิน');
            $table->integer('savemoney_receive')->comment('รับเงิน');
            $table->integer('savemoney_change')->comment('ทอนเงิน');
            $table->timestamps();

            // $table->foreign('customer_id')->references('id')->on('customers');
            // $table->foreign('ricedate_id')->references('id')->on('ricedates');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('save_money');
    }
};
