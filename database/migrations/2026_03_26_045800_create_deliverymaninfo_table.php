<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('deliverymaninfo', function (Blueprint $table) {
            $table->id(); // internal PK
            $table->unsignedBigInteger('user_id')->unique(); // primary key as user_id (unique)
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('reset_password')->nullable();
            $table->string('phone');
            $table->timestamps();

            
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('deliverymaninfo');
    }
};