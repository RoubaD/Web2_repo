<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Exception;

class UserController extends Controller
{
    public function register(Request $request)
    {
        try {
            // Log the beginning of the registration process
            Log::info("Starting user registration.");
            Log::info('Request Data:', $request->all());

            // Validate request data
            $validatedData = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'gender' => 'required|in:male,female',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8|confirmed',
            ]);

            $validatedData = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'gender' => 'required|in:male,female',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8|confirmed',
            ]);
            

            // Hash the password
            $validatedData['password'] = Hash::make($validatedData['password']);

            // Create user
            $user = User::create($validatedData);

            // Log successful registration
            Log::info("User registered successfully: {$user->email}");

            // Return success message
            return redirect()->back()->with('success', 'Welcome ' . $user->first_name . ' ' . $user->last_name);

        } catch (Exception $e) {
            // Log the error message
            Log::error("Registration failed: " . $e->getMessage());

            // Return an error response to the user
            return redirect()->back()->withErrors(['error' => 'Registration failed. Please try again.']);
        }
    }
}
