<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function Index(){
        //$pending_orders = Order::where("order_status", "Pending")->get();

        $pending_orders = Order::select(
            "orders.*",
            "users.name",
        )
            ->join("users", "users.id", "=", "orders.user_id")
            ->where("order_status", "Pending")
            ->get();

        return view('admin.pendingorder', compact('pending_orders'));
    }

    
}
