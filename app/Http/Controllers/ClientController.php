<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ShippingInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function CategoryPage($id)
    {
        $category_info = Category::findOrFail($id);
        $products = Product::where('category_id', $id)->latest()->get();
        return view('user_template.category', compact('category_info', 'products'));
    }

    public function SingleProduct($id)
    {
        $pro = Product::findOrFail($id);
        $product_category_id = Product::where('id', $id)->value('category_id');

        $same_cat_products = Product::where('category_id', $product_category_id)->latest()->get();
        return view('user_template.product', compact('pro', 'same_cat_products'));
    }

    public function AddToCart()
    {
        $user_id = Auth::id();
        //$cart_items = Cart::where('user_id', $user_id)->get();

        // inner join
        $cart_items = Cart::select(
            "carts.*",
            "products.product_name",
            "products.product_price",
            "products.product_image",
            "products.id AS pro_id"
        )
            ->join("products", "products.id", "=", "carts.product_id")
            ->where('user_id', $user_id)
            ->get();
        // ->toArray();
        //print_r($cart_items);

        return view('user_template.addtocart', compact('cart_items'));
    }

    public function ProductAddToCart(Request $request)
    {

        $product_qty = $request->product_qty;
        $product_price = $request->product_price;
        $tota_price = $product_qty * $product_price;

        Cart::insert([
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
            'pro_qty' => $product_qty,
            'total_price' => $tota_price,

        ]);
        return redirect()->route('addtocart')->with('message', 'Your Item Added to Cart Successfully!');

    }

    public function ShippingAddress()
    {
        return view('user_template.shipping_address');
    }

    public function AddShippingInfo(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'city_name' => 'required',
            'postal_code' => 'required',
            'phone' => 'required',
        ]);

        ShippingInfo::insert([
            'user_id' => Auth::id(),
            'address' => $request->address,
            'city_name' => $request->city_name,
            'postal_code' => $request->postal_code,
            'phone' => $request->phone,

        ]);
        return redirect()->route('checkout')->with('message', 'Your Item Added to Cart Successfully!');

    }

    public function DeleteCartItem($id)
    {
        Cart::findOrFail($id)->delete();
        return redirect()->route('addtocart')->with('message', 'Cart Item Deleted Successfully!');
    }

    public function Checkout()
    {
        $user_id = Auth::id();
        // $cart_items = Cart::where('user_id', $user_id)->get();

        $cart_items = Cart::select(
            "carts.*",
            "products.product_name",
            "products.product_price",
            "products.product_image",
            "products.id AS pro_id"
        )
            ->join("products", "products.id", "=", "carts.product_id")
            ->where('user_id', $user_id)
            ->get();

        $shipping_info = ShippingInfo::where('user_id', $user_id)->get();
        return view('user_template.checkout', compact('cart_items', 'shipping_info'));
    }

    public function PlaceOrder(Request $request){
        $user_id = Auth::id();
        $cart_items = Cart::where('user_id', $user_id)->get();
        $shipping_info = ShippingInfo::where('user_id', $user_id)->first();
        //$order_id = 1;

        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'shipping_phone' => $shipping_info->phone,
            'shipping_city' => $shipping_info->city_name,
            'shipping_postal_code' => $shipping_info->postal_code,
            'shipping_address' => $shipping_info->address,
            'total_price' => $request->total_price,
            'order_status' => 'Pending',

        ]);

        foreach($cart_items as $item){
            $total_price = $item->total_price ;
            $pro_qty = $item->pro_qty;
            $pro_price = ($total_price / $pro_qty);
            $cart_id = $item->id;

            OrderDetail::insert([
            'user_id' => Auth::id(),
            'order_id' => $order_id,
            'cart_id' => $cart_id,
            'pro_id' => $item->product_id,
            'pro_qty' => $pro_qty,
            'pro_price' => $pro_price,
            'pro_total' => $total_price,
            ]);
            Cart::findOrFail($cart_id)->delete();            
        }

        ShippingInfo::findOrFail($shipping_info->id)->delete();        
        return redirect()->route('userpendingorders')->with('message', 'Order Place Successfully!');



    }

    public function UserProfile()
    {
        return view('user_template.userprofile');
    }

    public function UserPendingOrders()
    {
        $user_id = Auth::id();
        $pending_orders = Order::where("order_status", "Pending")->where("user_id", $user_id)->get();
        // print_r($pending_orders); exit;
        return view('user_template.userpendingorders', compact('pending_orders'));
    }

    public function UserHistoryOrders()
    {
        return view('user_template.userhistoryorders');
    }

    public function CustomerService()
    {
        return view('user_template.customerservice');
    }

    public function NewRelease()
    {
        return view('user_template.newrelease');
    }

    public function TodaysDeal()
    {
        return view('user_template.todaysdeal');
    }

}
