<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Product;


class FrontendController extends Controller
{
    public function index()
    {
        $categories = Category::with('subcategories')->get();
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('frontend.home.index', compact('categories', 'products'));
    }

    public function productDetail($id, $slug)
    {
        $categories = Category::with('subcategories')->get();
        $product = Product::find($id);
        return view('frontend.home.details', compact('categories', 'product'));

    }

    public function categoryProduct($slug)
    {
        $categories = Category::with('subcategories')->get();
        $categoryProducts = Category::with('products')->where('slug', $slug)->first();
        return view('frontend.home.category-product', compact('categories', 'categoryProducts'));
    }

    public function checkout()
    {
        $categories = Category::with('subcategories')->get();
        $products = Cart::with('products')->orderBy('id', 'desc')->get();
        return view('frontend.home.checkout', compact('products', 'categories'));
    }

    public function qtyUpdate($id)
    {
        $qtyUpdate = Cart::find($id);
        $qtyUpdate->qty = request()->qty;
        $qtyUpdate->save();
        return redirect()->back()->with('success', 'Quantity has been Updated');
    }
}
