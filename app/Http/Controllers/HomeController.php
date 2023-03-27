<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function Index()
    {

        // Auth::check();
        // if (Auth::check()) {
        //     $user_id = Auth::id();
        //     $user_role_id = DB::table('role_user')
        //         ->selectRaw('*')
        //         ->where('user_id', $user_id)
        //         ->value('role_id');

        //     if ($user_role_id == 1) {
        //         return view('admin.dashboard');
        //     }
        //     if ($user_role_id == 2) {
        //         $user_id = Auth::id();
        //         $pending_orders = Order::where("order_status", "Pending")->where("user_id", $user_id)->get();
        //         return view('user_template.userpendingorders', compact('pending_orders'));

        //     }
        //     if ($user_role_id == 3) {
        //         return view('user_template.free_user_page');
        //     }

        // } else {
        //     $allProducts = Product::latest()->get();
        //     print_r($allProducts);exit;
        //     return view('user_template.layouts.home', compact('allProducts'));

        // }

        $allProducts = Product::latest()->get();
        return view('user_template.layouts.home', compact('allProducts'));
    }
}
