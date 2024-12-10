<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    // Fetch services of the authenticated user
    public function index()
    {
        // Get the user ID from the session
        $userId = session('user_id');
    
        if (!$userId) {
            return redirect()->route('login')->withErrors('Please log in to view your services.');
        }
    
        // Fetch services for the user
        $services = Service::where('user_id', $userId)->take(3)->get();
    
        return view('services', ['services' => $services]);
    }
    

    // Add a new service
    public function store(Request $request)
    {
        $userId = session('user_id');
        $serviceCount = Service::where('user_id', $userId)->count();

        if ($serviceCount >= 3) {
            return redirect()->back()->withErrors('You can only have up to 3 services.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image_url' => 'required|url',
        ]);

        Service::create([
            'user_id' => $userId,
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'image_url' => $request->input('image_url'),
        ]);

        return redirect('/services');
    }

    public function delete(Request $request)
    {
        // Validate the request to ensure the ID is provided
        $request->validate([
            'service_id' => 'required|exists:services,id',
        ]);

        // Retrieve the service ID from the request
        $serviceId = $request->input('service_id');

        // Find and delete the service
        $service = Service::findOrFail($serviceId);
        $service->delete();

    

        return redirect('/services');
    }

    public function update(Request $request)
{
    // Validate the request to ensure the ID is provided
    $request->validate([
        'service_id' => 'required|exists:services,id',
        'name' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'image_url' => 'nullable|url',
    ]);

    // Retrieve the service ID and find the service
    $serviceId = $request->input('service_id');
    $service = Service::findOrFail($serviceId);

    // Check if the current user is authorized to update the service
    if ($service->user_id !== session('user_id')) {
        return redirect()->back()->withErrors('You are not authorized to update this service.');
    }

    // Check if any of the fields are non-empty
    $hasUpdates = false;

    if ($request->has('name') && !empty($request->input('name'))) {
        $service->name = $request->input('name');
        $hasUpdates = true;
    }
    if ($request->has('description') && !empty($request->input('description'))) {
        $service->description = $request->input('description');
        $hasUpdates = true;
    }
    if ($request->has('image_url') && !empty($request->input('image_url'))) {
        $service->image_url = $request->input('image_url');
        $hasUpdates = true;
    }

    // Only save if at least one field was updated
    if ($hasUpdates) {
        $service->save();
    }

    return redirect('/services');
}

}
