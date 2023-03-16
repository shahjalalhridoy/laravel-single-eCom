<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function Index(){
        $allsubcategories = Subcategory::latest()->get();        
        return view('admin.allsubcategory', compact('allsubcategories'));
    }

    public function AddSubCategory(){
        $categories = Category::latest()->get();
        return view('admin.addsubcategory', compact('categories'));
    }


    public function StoreSubCategory(Request $request){
      
        $request->validate([
            'category_id' => 'required',
            'sub_category_name' => 'required|unique:subcategories|max:255',
        ]);
        $category_id = $request->category_id;
        $category_name = Category::where('id', $category_id)->value('category_name');

        Subcategory::insert([
            'category_id' => $request->category_id,
            'sub_category_name' => $request->sub_category_name,
            'sub_category_slug' => strtolower(str_replace(' ', '-', $request->sub_category_name)),
            'category_name' => $category_name,

        ]);
        Category::where('id', $category_id)->increment('sub_category_count', 1);

        return redirect()->route('allsubcategory')->with('message', 'Sub Category Added Successfully!');

    }

    public function EditSubCategory($id){
        $sub_category_info = Subcategory::findOrFail($id);
        return view('admin.editsubcategory', compact('sub_category_info'));
    }

    public function UpdateSubCategory(Request $request){
        $sub_category_id = $request->sub_category_id;
      
        $request->validate([
            // 'category_id' => 'required',
            'sub_category_name' => 'required|unique:subcategories|max:255',
        ]);

        // $category_id = $request->category_id;
        // $category_name = Category::where('id', $category_id)->value('category_name');


        Subcategory::findOrFail($sub_category_id)->update([
            // 'category_id' => $request->category_id,
            'sub_category_name' => $request->sub_category_name,
            'sub_category_slug' => strtolower(str_replace(' ', '-', $request->sub_category_name)),
            // 'category_name' => $category_name,

        ]);
        return redirect()->route('allsubcategory')->with('message', 'Sub Category Updated Successfully!');

    }

    public function DeleteSubCategory($id){
        $category_id = Subcategory::where('id', $id)->value('category_id');
        Subcategory::findOrFail($id)->delete();
        Category::where('id', $category_id)->decrement('sub_category_count', 1);
        return redirect()->route('allsubcategory')->with('message', 'Sub Category Deleted Successfully!');
    }





}
