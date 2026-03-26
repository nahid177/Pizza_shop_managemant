<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id(); // primary key

            // FK → order_info table
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')
                  ->references('order_id')
                  ->on('order_info')
                  ->onDelete('cascade');

            // FK → types table
            $table->foreignId('type_id')
                  ->constrained('types')
                  ->onDelete('cascade');

            $table->integer('box'); // number of boxes
            $table->decimal('amount', 10, 2); // total amount
            $table->string('address'); // delivery address
            $table->decimal('miles', 5, 2); // delivery distance in miles

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};