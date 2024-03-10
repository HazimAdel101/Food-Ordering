<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // $table->foreignId('food_id')->constrained()->onDelete('cascade');
            $table->foreignId('food_id')->constrained()->onDelete('cascade')->references('id')->on('foods');
            $table->foreignId('restaurant_id')->constrained()->onDelete('cascade');
            $table->foreignId('supplier_id')->nullable();
            $table->decimal('total', 8, 2)->default(0);
            $table->timestamps();

            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade')->nullable();

        });

        DB::statement('ALTER TABLE orders MODIFY created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP');
        DB::statement('ALTER TABLE orders MODIFY updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP');
    }


    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
