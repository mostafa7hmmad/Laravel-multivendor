<?php

namespace Database\Seeders;

use App\Models\Cat;
use App\Models\User;
use App\Models\Writer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([

'password'=>bcrypt('123456'),
'email'=>'mostafa@admin.com',
        ]);
    }
}
