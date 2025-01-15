<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke model Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Fungsi untuk menambahkan item ke keranjang.
     */
    public static function addToCart($productId, $quantity)
    {
        $user = Auth::user();

        // Cek apakah produk sudah ada di keranjang
        $cart = self::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->first();

        if ($cart) {
            // Jika ada, update jumlah
            $cart->quantity += $quantity;
            $cart->save();
        } else {
            // Jika tidak ada, buat entri baru
            self::create([
                'user_id' => $user->id,
                'product_id' => $productId,
                'quantity' => $quantity,
            ]);
        }
    }

    /**
     * Fungsi untuk menghapus item dari keranjang.
     */
    public static function removeFromCart($productId)
    {
        $user = Auth::user();

        $cart = self::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->first();

        if ($cart) {
            $cart->delete();
        }
    }

    /**
     * Fungsi untuk mendapatkan keranjang belanja pengguna.
     */
    public static function getUserCart()
    {
        $user = Auth::user();

        return self::where('user_id', $user->id)->get();
    }
}
