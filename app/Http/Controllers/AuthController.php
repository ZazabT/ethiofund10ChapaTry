<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Validation\ValidationException;


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
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]);

            // Create user
            $user = User::create($validated);

            // Log the user in
            Auth::login($user);

            // Redirect with success message
            return redirect()->route('home')->with('success', 'Registration successful and logged in.');

        } catch (ValidationException $e) {
            
            return redirect()->back()->withErrors($e->errors())->withInput();

        } catch (\Exception $e) {
            // Log the error for debugging purposes (Optional)
            Log::error('Registration error: ' . $e->getMessage(), ['exception' => $e]);

            // Redirect with error message
            return redirect()->back()->with('error', 'An error occurred during registration. Please try again.');
        }
    }

   
    
    public function login(Request $request)
    {
        try {
            // Validate input data
            $validated = $request->validate([
                'email' => 'required|email',
                'password' => 'required|string',
            ]);
    
            // Attempt to authenticate the user
            if (Auth::attempt($validated)) {
                // Regenerate session to prevent session fixation
                $request->session()->regenerate();
    
                // Redirect to the home page with a success message
                return redirect()->route('home')->with('success', 'You have successfully logged in.');
            }
    
            // If authentication fails, throw a validation exception with custom message
            throw ValidationException::withMessages([
                'credentials' => 'Sorry, incorrect email or password.',
            ]);
    
        } catch (ValidationException $e) {
            // Redirect back with validation errors and old input
            return redirect()->back()->withErrors($e->errors())->withInput();
    
        } catch (\Exception $e) {
            // Log the error for debugging purposes
            Log::error('Login error: ' . $e->getMessage(), ['exception' => $e]);
    
            // Redirect with a generic error message
            return redirect()->back()->with('error', 'An error occurred while logging in. Please try again.');
        }
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
