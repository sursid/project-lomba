<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();  // Menghubungkan cart dengan pengguna
            $table->bigInteger('product_id')->unsigned();  // Menghubungkan cart dengan produk
            $table->integer('quantity')->default(1);  // Jumlah produk dalam keranjang
            $table->decimal('price', 10, 2);  // Harga produk
            $table->timestamps();

            // Menambahkan foreign key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
