<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Customer;
use App\Models\Admin;
use App\Models\Cat;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Customer as ModelsCustomer;
use App\Models\Subcat;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\ApiToken;
use App\Models\User;
use App\Models\Userapi;
use App\Models\Writer;
use Illuminate\Support\Facades\Hash;

class APIController extends Controller
{
public function index($id=null)  {

    return $id?Cat::find($id):Cat::all();
}
public function sub($id=null)  {

    return $id?Subcat::find($id):Subcat::all();

}
public function client()  {

    return Client::all();

}
public function customer()  {

    return ModelsCustomer::all();

}
public function admin()  {

    return Admin::all();

}
public function add(Request $request) {
    // Check if the request is empty
    if (!$request->has(['username', 'email', 'password'])) {
        return response()->json(['message' => 'No request data received'], 400);
    }

    // Validate the request data
    $validatedData = $request->validate([
        'username' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:admins',
        'password' => 'required|string|min:8',
    ]);

    // Create a new Admin instance and set its properties
    $data = new Admin;
    $data->username = $validatedData['username'];
    $data->email = $validatedData['email'];
    $data->password = Hash::make($validatedData['password']); // Hash the password

    // Save the Admin instance to the database
    $result = $data->save();

    // Return the appropriate response
    if ($result) {
        return response()->json(['message' => 'Data saved'], 201);
    } else {
        return response()->json(['message' => 'Data unsaved'], 500);
    }
}

public function update(Request $request) {
    // Find the admin by ID
    $admin = Admin::find($request->id);

    // Check if admin exists
    if (!$request->has(['username', 'email', 'password'])) {
        return response()->json(['message' => 'No request data received'], 400);
    }

    // List of updatable fields
    $updatableFields = ['username', 'email', 'password'];

    // Check if there are any values in the request to update
    $hasUpdates = false;
    foreach ($updatableFields as $field) {
        if ($request->has($field)) {
            $hasUpdates = true;
            break;
        }
    }

    // If no values are provided, return a message indicating nothing to update
    if (!$hasUpdates) {
        return response()->json(['message' => 'Nothing to update'], 400);
    }

    // Validate the request data
    $validatedData = $request->validate([
        'username' => 'nullable|string|max:255',
        'email' => 'required|string|email|max:255|unique:admins,email,' . $admin->id,
        'password' => 'required|string|min:8',
    ]);

    // Update the admin's properties
    if ($request->has('username')) {
        $admin->username = $validatedData['username'];
    }
    if ($request->has('email')) {
        $admin->email = $validatedData['email'];
    }
    if ($request->has('password')) {
        $admin->password = Hash::make($validatedData['password']);
    }

    // Save the changes to the database
    $result = $admin->save();

    // Return the appropriate response
    if ($result) {
        return response()->json(['message' => 'Admin updated successfully'], 200);
    } else {
        return response()->json(['message' => 'Failed to update admin'], 500);
    }
}


public function delete(Request $request) {
    // Find the admin by ID
    $admin = Admin::find($request->id);

    // Check if admin exists
    if (!$admin) {
        return response()->json(['message' => 'There is no Admin to delete it'], 404);
    }

    // Attempt to delete the admin
    $result = $admin->delete();

    // Return the appropriate response
    if ($result) {
        return response()->json(['message' => 'Admin deleted successfully'], 200);
    } else {
        return response()->json(['message' => 'Failed to delete admin'], 500);
    }
}

    /**
     * Find an admin by ID.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request)
    {
            // Check if ID is provided
            if (is_null($request->id)) {
                return response()->json([
                    'message' => 'No parameter given.'
                ], 400);
            }

            // Check if ID is a numeric value
            if (!is_numeric($request->id)) {
                return response()->json([
                    'message' => 'Invalid ID format.'
                ], 400);
            }

        // Find the admin by ID
        $admin = Admin::find($request->id);

        // Check if admin was found
        if (!$admin) {
            return response()->json([
                'message' => 'This admin does not exist'
            ], 404);
        }

        // Return the found admin
        return response()->json([
            'data' => $admin
        ], 200);
    }

    public function login(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Attempt to find the user by email
        $user = User::where('email', $request->email)->first();

        // Check if the user exists and the password is correct
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        // Generate a unique token for the user
        $token = bin2hex(random_bytes(30)); // Generate a random token

        // Store or update the token in the database
        // Here you would implement your own logic to store and manage tokens

        return response()->json([
            'message' => 'Login successful',
            'access_token' => $token,
            'token_type' => 'Bearer',
            // 'expires_in' => 3600, // Optional: specify token expiration time
        ]);

    }    }

