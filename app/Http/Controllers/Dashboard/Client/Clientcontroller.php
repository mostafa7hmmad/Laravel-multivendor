<?php

namespace App\Http\Controllers\Dashboard\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Clientcontroller extends Controller
{
    public function deletecustomer($id)
    {
        $data=Customer::findOrFail($id);
        $data->delete();

        return redirect(route('customer-dah-us'));
    }
    public function customers()  {


        $data['customers']=Customer::all();
                return view('Dashboard.Customer.customer')->with($data);
            }
    public function clients(){

$data['clients']=Client::all();
        return view('Dashboard.Clients.client')->with($data);
    }
    public function delete($id)
    {
        // Find the client
        $client = Client::findOrFail($id);

        // Delete related records in cat__clients
        DB::table('cat__clients')->where('client_id', $client->id)->delete();

        // Delete the client
        $client->delete();

        return redirect(route('client-dah-us'))->with('message', 'Client deleted successfully');
    }

}
