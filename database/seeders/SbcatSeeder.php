<?php

namespace Database\Seeders;

use App\Models\Subcat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SbcatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subcat::create([
            'cat_id'=>'1',
            'price'=>'10$',
            'img'=>'1.png',
            'name'=>'Leggins',
        ]);
        Subcat::create([
            'cat_id'=>'2',
            'price'=>'10$',
            'img'=>'2.png',
            'name'=>'Chest Press',
        ]);
        Subcat::create([
            'cat_id'=>'3',
            'price'=>'10$',
            'img'=>'3.png',
            'name'=>'Suits',
        ]);
        Subcat::create([
            'cat_id'=>'4',
            'price'=>'10$',
            'img'=>'4.png',
            'name'=>'Dress',
        ]);
        Subcat::create([
            'cat_id'=>'5',
            'price'=>'10$',
            'img'=>'5.png',
            'name'=>'Dress Children',
        ]);
        Subcat::create([
            'cat_id'=>'6',
            'price'=>'10$',
            'img'=>'6.png',
            'name'=>'Deep Cut Shirt',
        ]);
    }
}
