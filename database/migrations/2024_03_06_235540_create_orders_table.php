<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            // $table->foreignId('supplier_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->decimal('price', 10, 2);
            $table->timestamps();
        });

        DB::statement('ALTER TABLE orders MODIFY created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP');
        DB::statement('ALTER TABLE orders MODIFY updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP');

    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
