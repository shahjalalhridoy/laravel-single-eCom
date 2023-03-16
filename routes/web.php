<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

// Route::get('/', function () {
//     // return view('welcome');
//     return view('user_template.layouts.template');
// });

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'Index')->name('Home');

});



Route::controller(ClientController::class)->group(function () {
    
    Route::get('/category/{id}/{slug}', 'CategoryPage')->name('category');
    Route::get('/product-details/{id}/{slug}', 'SingleProduct')->name('singleproduct');
    Route::get('/user-profile', 'UserProfile')->name('userprofile');
    Route::get('/new-release', 'NewRelease')->name('newrelease');

    

});

Route::middleware('auth', 'role:user')->group(function () {
    Route::controller(ClientController::class)->group(function () {       
        Route::get('/add-to-cart', 'AddToCart')->name('addtocart');
        Route::get('/checkout', 'Checkout')->name('checkout');
        Route::get('/user-profile', 'UserProfile')->name('userprofile');
        Route::get('/user-profile/pending-orders', 'UserPendingOrders')->name('userpendingorders');   
        Route::get('/user-profile/history-orders', 'UserHistoryOrders')->name('userhistoryorders');    
        Route::post('/product-add-to-cart', 'ProductAddToCart')->name('productaddtocart');
        Route::get('/todays-deal', 'TodaysDeal')->name('todaysdeal');
        Route::get('/customer-service', 'CustomerService')->name('customerservice');
        Route::get('/delete-cart-item/{id}', 'DeleteCartItem')->name('deletecartitem');
        Route::get('/shipping-address', 'ShippingAddress')->name('shippingaddress');

        Route::post('/add-shipping-info', 'AddShippingInfo')->name('addshippinginfo');

        Route::post('/place-order', 'PlaceOrder')->name('placeorder');

        



        
    
    });
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'role:user', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/user-profile', [DashboardController::class, 'Index1']);
// Route::get('/user-profile1', [DashboardController::class, 'Index2']);Route::get('/user-profile2', [DashboardController::class, 'Index3']);

Route::middleware('auth', 'role:admin')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/admin/dashboard', 'Index')->name('admindashboard');
    });
});

Route::middleware('auth', 'role:admin')->group(function () {
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/admin/all-category', 'Index')->name('allcategory');
        Route::get('/admin/add-category', 'AddCategory')->name('addcategory');
        Route::post('/admin/store-category', 'StoreCategory')->name('storecategory');
        Route::get('/admin/edit-category/{id}', 'EditCategory')->name('editcategory');
        Route::post('/admin/update-category', 'UpdateCategory')->name('updatecategory');
        Route::get('/admin/delete-category/{id}', 'DeleteCategory')->name('deletecategory');

    });
});

Route::middleware('auth', 'role:admin')->group(function () {
    Route::controller(SubCategoryController::class)->group(function () {
        Route::get('/admin/all-subcategory', 'Index')->name('allsubcategory');
        Route::get('/admin/add-subcategory', 'AddSubCategory')->name('addsubcategory');
        Route::post('/admin/store-subcategory', 'StoreSubCategory')->name('storesubcategory');
        Route::get('/admin/edit-subcategory/{id}', 'EditSubCategory')->name('editsubcategory');
        Route::post('/admin/update-subcategory', 'UpdateSubCategory')->name('updatesubcategory');
        Route::get('/admin/delete-subcategory/{id}', 'DeleteSubCategory')->name('deletesubcategory');

    });
});

Route::middleware('auth', 'role:admin')->group(function () {
    Route::controller(ProductController::class)->group(function () {
        Route::get('/admin/all-product', 'Index')->name('allproduct');
        Route::get('/admin/add-product', 'AddProduct')->name('addproduct');
        Route::post('/admin/store-product', 'StoreProduct')->name('storeproduct');
        Route::get('/admin/edit-product-img/{id}', 'EditProductImg')->name('editproductimg');
        Route::post('/admin/update-product-img', 'UpdateProductImg')->name('updateproductimg');
        Route::get('/admin/edit-product/{id}', 'EditProduct')->name('editproduct');
        Route::post('/admin/update-product', 'UpdateProduct')->name('updateproduct');
        Route::get('/admin/delete-product/{id}', 'DeleteProduct')->name('deleteproduct');

    });
});

Route::middleware('auth', 'role:admin')->group(function () {
    Route::controller(OrderController::class)->group(function () {
        Route::get('/admin/pending-order', 'Index')->name('pendingorder');

    });
});



 Route::middleware('auth')->group(function () {
    Route::controller(LogoutController::class)->group(function () {
        Route::get('/logout', 'perform')->name('logout');

    });
});

require __DIR__ . '/auth.php';
