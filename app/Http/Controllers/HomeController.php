<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $services = [
            [
                'name' => 'City Tours',
                'image_url' => 'assets/city-icon.png',
                'description' => 'Explore major attractions and hidden gems in a city, guided by local insights and stories.',
            ],
            [
                'name' => 'Adventure Tours',
                'image_url' => 'assets/adventure-icon.png',
                'description' => 'Engage in thrilling outdoor activities like hiking, zip-lining, or rock climbing in scenic locations.',
            ],
            [
                'name' => 'Cultural Experiences',
                'image_url' => 'assets/vase.png',
                'description' => 'Immerse yourself in local culture through food tastings, traditional crafts, and local festivals.',
            ],
            [
                'name' => 'Historical Tours',
                'image_url' => 'assets/history.png',
                'description' => 'Discover historical sites and learn about significant events that shaped the area.',
            ],
            [
                'name' => 'Food Tours',
                'image_url' => 'assets/restaurant.png',
                'description' => 'Sample local cuisine at markets and restaurants, exploring culinary traditions and specialties.',
            ],
            [
                'name' => 'Nature Tours',
                'image_url' => 'assets/nature.png',
                'description' => 'Experience the beauty of local ecosystems through guided hikes and wildlife watching.',
            ],
        ];
        
        return view('index', ['services' => $services]);
    }
    /**
     * Register a new user.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        // Create the user
        $user = User::create([
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        session([
            'logged_in' => true,
            'user_id' => $user->id,
            'user_email' => $user->email,
        ]);

        // Return a success response
        return response()->json([
            'message' => 'User registered successfully',
            'user' => $user,
        ], 201);
    }

    /**
     * Login a user.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        // Validate the incoming request
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            $user = Auth::user(); // Get the authenticated user
            session([
                'logged_in' => true,
                'user_id' => $user->id,
                'user_email' => $user->email,
            ]);
            return response()->json([
                'message' => 'Login successful',
                'user' => $user,
            ], 200);
        }

        // Return an error if authentication fails
        return response()->json([
            'message' => 'Invalid email or password',
        ], 401);
    }

    public function logout(Request $request)
    {
        // Clear the session data
        session()->forget(['logged_in', 'user_id', 'user_email']);
        session()->flush(); // Optional: Clear all session data
    
        // Optionally log out from Laravel's Auth
        Auth::logout();
    
        // Redirect to the homepage
        return redirect('/'); // Ensure this is returned
    }
    

}
