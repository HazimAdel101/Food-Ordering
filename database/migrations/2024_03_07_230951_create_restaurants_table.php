<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->time('open')->nullable();
            $table->time('close')->nullable();
            $table->string('photo')->nullable();
            $table->string('website')->nullable();
            $table->text('description')->nullable();
            $table->enum('status', ['open', 'closed', 'temporarily_closed'])->default('open');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
