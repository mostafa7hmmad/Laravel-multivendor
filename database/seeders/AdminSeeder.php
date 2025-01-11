<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use App\Models\Userapi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
for( $i=0;$i<11;$i++){
    Admin::create([
        'email'=>'mostafa@admin.com',
        'username'=>'mostafa hammad',
        'password' => bcrypt('123456'),
    ]);
}

User::create([
    'email'=>'admin@admin.com',
    'password' => bcrypt('123456'),
]);
    }
}
