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
            return redirect()->back()->with('error', 'Registration failed:' . $e->getMessage());

        }
    }

    // public function showUsers()
    // {
    //      // Fetch users from the database (replace with your logic)
    //      $users = User::all(); // Assuming 'User' is your model
    //      return view('listing', ['users' => $users]);
    // }

    public function showUsers(Request $request) {
        $query = User::query();
    
        // Apply filters if search parameters are provided
        if ($request->filled('name')) {
            $query->where('first_name', 'like', '%' . $request->name . '%')
                  ->orWhere('last_name', 'like', '%' . $request->name . '%');
        }
    
        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }
    
        $users = $query->get();
        return view('listing', compact('users'));
    }

    public function showUserDetails($id)
    {
        // Fetch the user by ID
        $user = User::findOrFail($id); // Will throw a 404 if user not found
        return view('user-details', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('edit-user', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);
    
        $user->update($validatedData);
    
        return redirect()->route('user-details', $user->id)->with('success', 'User updated successfully!');
    }
    
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    
        return redirect('/listing')->with('success', 'User deleted successfully!');
    }
        
    
    

}
