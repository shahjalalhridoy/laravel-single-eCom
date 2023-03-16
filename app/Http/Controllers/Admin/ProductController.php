<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function Index()
    {       
        $products = Product::latest()->get();
        return view('admin.allproduct', compact('products'));
    }

    public function AddProduct()
    {
        $categories = Category::latest()->get();
        $sub_categories = Subcategory::latest()->get();
        return view('admin.addproduct', compact('categories', 'sub_categories'));
    }

    public function StoreProduct(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'product_name' => 'required|unique:products|max:255',
            'product_price' => 'required',
            'product_qty' => 'required',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            
        ]);
        $image = $request->file('product_image');
        $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $request->product_image->move(public_path('upload'), $img_name);
        $img_url = 'upload/' . $img_name;

        $category_id = $request->category_id;
        $product_category_name = Category::where('id', $category_id)->value('category_name');

        $sub_category_id = $request->sub_category_id;
        $product_sub_category_name = Subcategory::where('id', $sub_category_id)->value('sub_category_name');

        Product::insert([
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_short_desc' => $request->product_short_desc,
            'product_long_desc' => $request->product_long_desc,
            'product_category_name' => $product_category_name,
            'product_sub_category_name' => $product_sub_category_name,
            'product_image' => $img_url,
            'product_qty' => $request->product_qty,
            'product_slug' => strtolower(str_replace(' ', '-', $request->product_name)),

        ]);
        Category::where('id', $category_id)->increment('product_count', 1);
        Subcategory::where('id', $sub_category_id)->increment('product_count', 1);

        return redirect()->route('allproduct')->with('message', 'Product Added Successfully!');

    }

    public function EditProductImg($id){
        $productInfo = Product::findOrFail($id);
        return view('admin.editproductimg', compact('productInfo'));
    }

    public function UpdateProductImg(Request $request){
        $product_id = $request->product_id; 
          
        $request->validate([
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = $request->file('product_image');
        $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $request->product_image->move(public_path('upload'), $img_name);
        $img_url = 'upload/' . $img_name;

        Product::findOrFail($product_id)->update([
           'product_image' => $img_url,

        ]);
        return redirect()->route('allproduct')->with('message', 'Product Image Updated Successfully!');

    }

    public function EditProduct($id){
        $productInfo = Product::findOrFail($id);
        $categories = Category::latest()->get();
        $sub_categories = Subcategory::latest()->get();
       
        return view('admin.editproduct', compact('productInfo', 'categories', 'sub_categories'));
    }


    public function UpdateProduct(Request $request){
        $product_id = $request->product_id; 
          
        $request->validate([            
            'product_name' => 'required|unique:products|max:255',
            'product_price' => 'required',
            'product_qty' => 'required',            
        ]);

        Product::findOrFail($product_id)->update([            
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_short_desc' => $request->product_short_desc,
            'product_long_desc' => $request->product_long_desc,            
            'product_qty' => $request->product_qty,
            'product_slug' => strtolower(str_replace(' ', '-', $request->product_name)),

        ]);

        return redirect()->route('allproduct')->with('message', 'Product Information Updated Successfully!');

    }


    public function DeleteProduct($id){

        $category_id = Product::where('id', $id)->value('category_id');
        $sub_category_id = Product::where('id', $id)->value('sub_category_id');

        
        Category::where('id', $category_id)->decrement('product_count', 1);
        Subcategory::where('id', $sub_category_id)->decrement('product_count', 1);
        Product::findOrFail($id)->delete();
        return redirect()->route('allproduct')->with('message', 'Product Deleted Successfully!');
    }



}
