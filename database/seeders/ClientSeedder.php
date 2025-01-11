<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeedder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=0;$i<20;$i++){
            Client::create([
                'name'=>'ahmed hammad',
                'email'=>'mostafa@mail.com',
                'price'=>'10$',
                'phone'=>'01154079827',
            ]);
        }
    }
}
