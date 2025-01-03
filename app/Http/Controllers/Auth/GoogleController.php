<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Exception;

class GoogleController extends Controller
{
    /**
     * Redirect to Google OAuth
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle Google Callback
     */
    public function handleGoogleCallback()
    {
        try {
            // Get user from Google
            $googleUser = Socialite::driver('google')->user();

            // Find existing user
            $user = User::where('email', $googleUser->email)->first();

            // Process and download avatar
            $avatarPath = $this->processGoogleAvatar($googleUser);

            if (!$user) {
                // Create new user if not exists
                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'username' => $this->generateUniqueUsername($googleUser->email),
                    'password' => bcrypt(Str::random(20)),
                    'role' => 'member',
                    'is_verified' => 1,
                    'followers_count' => 0,
                    'following_count' => 0,
                    'posts_count' => 0,
                    'is_active' => 1,
                    'avatar' => $avatarPath,
                ]);
            } else {
                // Update existing user with Google ID and avatar
                if (!$user->google_id) {
                    $user->update([
                        'google_id' => $googleUser->id,
                        'avatar' => $avatarPath
                    ]);
                }
            }

            // Login user
            Auth::login($user);

            // Redirect to intended page
            return redirect('/sosmed');
        } catch (Exception $e) {
            Log::error('Google Login Error: ' . $e->getMessage());
            return redirect('/login')
                ->withErrors(['error' => 'Login dengan Google gagal. Silakan coba lagi.']);
        }
    }

    /**
     * Process and Download Google Avatar
     */
    protected function processGoogleAvatar($googleUser)
    {
        try {
            // Cek apakah avatar tersedia
            if (!$googleUser->avatar) {
                return null;
            }

            // Ambil URL avatar dengan ukuran lebih besar
            $avatarUrl = preg_replace('/s\d+-c/', 's400-c', $googleUser->avatar);

            // Generate nama file unik
            $filename = Str::uuid() . '.jpg';
            $fullPath = public_path('assets/avatars/' . $filename);

            // Pastikan direktori tersedia
            if (!file_exists(dirname($fullPath))) {
                mkdir(dirname($fullPath), 0755, true);
            }

            // Download gambar
            $imageContent = file_get_contents($avatarUrl);

            // Simpan gambar
            file_put_contents($fullPath, $imageContent);

            return 'assets/avatars/' . $filename;
        } catch (Exception $e) {
            Log::error('Avatar Download Error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Generate Unique Username
     */
    protected function generateUniqueUsername($email)
    {
        $baseUsername = explode('@', $email)[0];
        $username = $baseUsername;
        $counter = 1;

        while (User::where('username', $username)->exists()) {
            $username = $baseUsername . $counter;
            $counter++;
        }

        return $username;
    }
}
