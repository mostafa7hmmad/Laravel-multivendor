<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function create(Request $request)
    {
        // Validate the form data
        $data = $request->validate([
            'name'       => 'required|string|max:191',  // Ensure name is a valid string with max length 191
            'email'      => 'required|string|email|max:191|unique:clients,email', // Validate email and ensure it's unique in the clients table
            'phone'      => 'required|string|max:191',  // Validate phone as a string with max length 191
            'totalPrice' => 'required|numeric|min:0',   // Ensure totalPrice is a positive number
            'products'   => ['required', function ($attribute, $value, $fail) {
                // Custom validation to check if products is a valid JSON
                if (!is_array(json_decode($value, true))) {
                    $fail('The ' . $attribute . ' field must be a valid JSON string.');
                }
            }],
        ]);


        try {
            // Debug the incoming data
            $products = json_decode($data['products'], true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                return redirect()->back()->with('error', 'Invalid products JSON.');
            }

            // Create the client record
            $client = Client::create([
                'name'        => $data['name'],
                'email'       => $data['email'],
                'phone'       => $data['phone'],
                'total_price' => $data['totalPrice'] ?? 0, // Set default value if not provided
            ]);

            // Save products
            foreach ($products as $product) {
                DB::table('client_products')->insert([
                    'client_id'     => $client->id,
                    'product_name'  => $product['name'],
                    'product_price' => $product['price'],
                    'quantity'      => $product['quantity'],
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ]);
            }

            return redirect()->route('index-us')->with('message', 'Order created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create order: ' . $e->getMessage());
        }
    }
}
