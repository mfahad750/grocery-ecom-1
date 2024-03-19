<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function productManage()
    {
        
        $products = Product::with('category', 'subcategory')->orderBy('id', 'desc')->get();
        return view('backend.product.index', compact('products'));
    }

    public function productAdd()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        $subcategories = Subcategory::orderBy('id', 'desc')->get();
        return view('backend.product.creat', compact('categories', 'subcategories'));
    }

    public function productStore(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'name' => 'required|string',
            'buy_price' => 'required',
            'sale_price' => 'required',
            'long_description' => 'required',
            'image' => 'required|image',
      ]);

      $imageName = time().'.'.$request->image->extension();
      $request->image->move('product', $imageName);

      Product::create([
           'category_id' => $request->category_id,
           'sub_category_id' => $request->sub_category_id,
           'name' => $request->name,
           'slug' => Str::slug( $request->name),
           'buy_price' => $request->buy_price,
           'sale_price' => $request->sale_price,
           'short_description' => $request->short_description,
           'long_description' => $request->long_description,
           'image' => $imageName,
      ]);
      return redirect()->back()->with('success', 'Prudact has been created');
  }

    public function productEdite($id)
    {
        $categories = Category::orderBy('id', 'desc')->get();
        $subcategories = Subcategory::orderBy('id', 'desc')->get();
        $product = Product::find($id);
        return view('backend.product.edit', compact('categories', 'subcategories', 'product'));

    }

    public function productUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'category_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'name' => 'required|string',
            'buy_price' => 'required',
            'sale_price' => 'required',
            'long_description' => 'required',
        ]);
        $product = Product::find($id);
        if($request->hasFile('image')){
            if($product->image && file_exists('product/'.$product->image)){
                unlink('product/'.$product->image);
            }
            $imageUpdateName = time().'.'.$request->image->extension();
            $request->image->move('product', $imageUpdateName);
            $product->image = $imageUpdateName;
        }

        $product->update([
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'name' => $request->name,
            'slug' => Str::slug( $request->name),
            'buy_price' => $request->buy_price,
            'sale_price' => $request->sale_price,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
        ]);
        return redirect('/product/manage')->with('success', 'Prudact has been updated');
    }

    public function productDelete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('info', 'Prudact has been deleted');

    }
}
