<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function showRegister(){
        return view('auth.register');
    }

    public function showLogin(){
        return view('auth.login');
    }

    public function register(Request $request)
    {
        try {
            // Validate input data
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]);

            // Create user
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => bcrypt($validated['password']),
            ]);

            // Log the user in
            Auth::login($user);

            // Redirect with success message
            return redirect()->route('home')->with('success', 'Registration successful and logged in.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();

        } catch (\Exception $e) {
            // Log the error for debugging purposes (Optional)
            Log::error('Registration error: ' . $e->getMessage(), ['exception' => $e]);

            // Redirect with error message
            return redirect()->back()->with('error', 'An error occurred during registration. Please try again.');
        }
    }

    public function login(Request $request){  
    }

    public function logout(Request $request)
    {
        try {
            // Logout the user
            Auth::logout();

            // Invalidate the session
            $request->session()->invalidate();

            // Regenerate the session token to prevent session fixation attacks
            $request->session()->regenerateToken();

            // Redirect the user to the home page or login page after logging out
            return redirect()->route('home')->with('success', 'You have successfully logged out.');
            
        } catch (\Exception $e) {
            // Log the error for debugging purposes (Optional)
            Log::error('Logout error: ' . $e->getMessage(), ['exception' => $e]);

            // Redirect the user with an error message if something went wrong
            return redirect()->route('home')->with('error', 'An error occurred while logging you out. Please try again.');
        }
    }

}
