<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pizzas', function (Blueprint $table) {
            $table->id();
            $table->string('name');           // Pizza name
            $table->json('size');             // Array of sizes: Small, Medium, Large
            $table->json('price');            // Price for each size
            $table->json('toppings');         // Array of toppings
            $table->unsignedBigInteger('pizza_menu_number')->nullable()->after('toppings'); 
            // Optional foreign key if linking to a shops table
            // $table->foreign('pizza_menu_number')->references('id')->on('shops')->onDelete('set null');
            $table->timestamps();             // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::table('pizzas', function (Blueprint $table) {
            // Drop foreign key if used
            // $table->dropForeign(['pizza_menu_number']);
        });

        Schema::dropIfExists('pizzas');
    }
};