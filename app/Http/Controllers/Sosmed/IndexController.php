<?php

namespace App\Http\Controllers\Sosmed;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Story;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Pastikan user sudah terautentikasi
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        // Ambil semua story yang masih aktif dan belum expired
        $stories = Story::where('is_active', 1)
            ->where(function ($query) {
                $query->whereNull('expires_at')
                    ->orWhere('expires_at', '>', now());
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('components.sosmed.index', [
            'user' => $user,
            'stories' => $stories
        ]);
    }
}
