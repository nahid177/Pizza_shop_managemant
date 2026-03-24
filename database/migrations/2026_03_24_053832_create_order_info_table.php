<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('order_info', function (Blueprint $table) {
            $table->id('order_id');
            $table->foreignId('type_id')->constrained('types')->onDelete('cascade');
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->unsignedBigInteger('menu_id');
            $table->foreign('menu_id')->references('pizza_menu_number')->on('pizza_infos')->onDelete('cascade');
            $table->string('payment_type');
            $table->decimal('payment_amount', 10, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_info');
    }
};