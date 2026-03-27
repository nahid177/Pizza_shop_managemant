<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')
                ->references('order_id')
                ->on('order_info')
                ->cascadeOnDelete();

            $table->foreignId('type_id')
                ->constrained('types')
                ->cascadeOnDelete();

            $table->foreignId('deliveryman_id')
                ->constrained('deliverymaninfo', 'user_id')
                ->cascadeOnDelete();

            $table->integer('box');
            $table->decimal('amount', 10, 2);
            $table->string('address');
            $table->decimal('miles', 5, 2);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};