<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Index(){
        $allProducts = Product::latest()->get();
        return view('user_template.layouts.home', compact('allProducts'));
    }
}
