<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->text('description');
            $table->integer('price');
            $table->integer('stock');
            $table->enum('category', [
                'beras', 
                'sayuran', 
                'buah', 
                'bibit', 
                'pupuk',
                'alat_tani',
                'lainnya'
            ]);
            $table->string('harvest_date')->nullable();
            $table->string('plant_date')->nullable();
            $table->string('variety')->nullable();
            $table->string('certification')->nullable();
            $table->decimal('weight', 8, 2);
            $table->string('condition')->nullable();
            $table->integer('min_order')->default(1);
            $table->integer('sold_count')->default(0);
            $table->decimal('rating', 2, 1)->default(0);
            $table->integer('review_count')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};