<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cat;
use App\Models\Subcat;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function shop($id)
    {
        $category = Cat::findOrFail($id);
        $subcategories = Subcat::where('cat_id', $id)->get();

        return view('Pages.shop', [
            'cat' => $category,
            'subcats' => $subcategories,
        ]);
    }

    public function subcategory($id)
    {
        $category = Cat::findOrFail($id);
        $subcategories = Subcat::where('cat_id', $id)->get();

        return view('Pages.subcategory', [
            'cat' => $category,
            'subcats' => $subcategories,
        ]);
    }

    public function check(Request $request)
    {
        $products = json_decode($request->input('products', '[]'), true);
        $totalPrice = $request->input('totalPrice', 0);

        return view('Pages.check', compact('products', 'totalPrice'));
    }
}
