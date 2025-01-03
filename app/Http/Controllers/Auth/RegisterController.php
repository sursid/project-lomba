<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    /**
     * Show registration form
     */
    public function create()
    {
        return view('components.auth.register');
    }

    /**
     * Store a new user registration
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:users,username',
                'email' => 'required|string|email|max:255|unique:users,email',
                'phone' => 'nullable|string|max:20',
                'password' => 'required|string|min:8', // Removed 'confirmed'
            ]);

            // Check if username already exists (case-insensitive)
            $existingUsername = User::whereRaw('LOWER(username) = ?', [strtolower($validated['username'])])
                ->exists();

            if ($existingUsername) {
                throw ValidationException::withMessages([
                    'username' => 'The username has already been taken.'
                ]);
            }

            // Check if email already exists (case-insensitive)
            $existingEmail = User::whereRaw('LOWER(email) = ?', [strtolower($validated['email'])])
                ->exists();

            if ($existingEmail) {
                throw ValidationException::withMessages([
                    'email' => 'The email has already been taken.'
                ]);
            }

            $user = User::create([
                'name' => $validated['name'],
                'username' => $validated['username'],
                'email' => $validated['email'],
                'phone' => $validated['phone'] ?? null,
                'password' => Hash::make($validated['password']),
                'role' => 'member',
                'is_active' => true,
                'last_active_at' => now(),
            ]);

            auth()->login($user);

            return response()->json([
                'code' => 200,
                'status' => true,
                'message' => 'Registration successful',
                'redirect' => '/sosmed'
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'code' => 422,
                'status' => false,
                'message' => $e->getMessage()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 500,
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
