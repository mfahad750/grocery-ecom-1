<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    public function subcategoryAddForm()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('backend.subcategory.add', compact('categories'));
    }

    public function sucategoryStore(Request $request)
    {
        $this->validate($request,[
            'category_id'=> 'required|integer',
            'name'       => 'required|string',
        ]);
        Subcategory::create([
            'category_id' => $request->category_id,
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
        ]);
        return redirect()->back()->withSuccess('Subcategory has been created');
    }

    public function subcategoryManage()
    {
        $subcategories = Subcategory::with('category')->orderby('id', 'desc')->get();
        return view('backend.subcategory.manage', compact('subcategories'));
    }

    public function subcategoryEdit($id)
    {
        $subcategory = Subcategory::find($id);
        return view('backend.subcategory.edit' , compact('subcategory'));
    }

    public function subcategoryUpdate(Request $request, $id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect('/subcategory/manage')->with('success','Subcategory has been Updated');
    }

    public function subcategoryDelete($id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->delete();
        return redirect('/subcategory/manage')->with('success', 'Subcategory has been deleted');
    }
}
