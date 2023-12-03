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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('article');
            $table->string('title');
            $table->decimal('price', 5, 2)->unsigned()->default(0.00);
            $table->foreignId('category_id')->nullable()->index()->constrained('categories')->onDelete('cascade');
            $table->foreignId('image_id')->nullable()->index()->constrained('images')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->integer('count')->unsigned()->default(0);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
