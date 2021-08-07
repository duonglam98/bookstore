<?php

use Illuminate\Support\Facades\Route;
use App\Models\Book;
use App\Models\Category;
use App\Http\Controllers\BookController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WishlistController;

use App\Http\Controllers\Admins\AdminController;
use App\Http\Controllers\Admins\AdminBookController;
use App\Http\Controllers\Admins\AdminCategoryController;
use App\Http\Controllers\Admins\AdminUserController;
use App\Http\Controllers\Admins\AdminOrderController;
use App\Http\Controllers\Admins\AdminStatisticController;


use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $user = Auth::user();
    $books = Book::latest()->paginate(8);
    $category = Category::get();
    $bookSlides = Book::offset(0)->limit(1)->get();
    $nameCategories = Category::offset(0)->limit(1)->get();
    $data = [
        'user' => $user,
        'books' => $books,
        'category' => $category,
        'bookSlides' => $bookSlides,
        'nameCategories' => $nameCategories,
    ];
    return view('/books/index', $data);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route::middleware(['auth:sanctum', 'verified'])
// ->get('/books', [BookController::class, 'index'])->name('books.index');

Route::get('/books', [BookController::class, 'index'])->name('books.index');
//-------------------------------------------------------------------------------------------------------------------
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.detail');

// end books

//-------------------------------------------------------------------------------------------------------------------
// start orders
Route::middleware(['auth'])->group(function () {
    Route::post('/orders/checkout', [OrderController::class, 'checkout'])->name('orders.payment');
    Route::get('/orders/pre-payment', [OrderController::class, 'checkOutCart'])->name('orders.checkOut');
    Route::post('/orders', [OrderController::class, 'store']);
    Route::get('/orders/cart', [OrderController::class, 'index'])->name('orders.cart');
    Route::delete('/orders/{book_order_id}', [OrderController::class, 'destroy'])->name('orders.destroy');
    Route::put('/orders/{book_orders_id}', [OrderController::class, 'update'])->name('orders.update');
    Route::get('orders/sendMail', [OrderController::class, 'sendMail'])->name('orders.sendMail');    
});
// end orders

//-----------------------------------------------------------------------------------------------------------
// order of users
Route::resource('users', UserController::class)->except([
    'create', 'store'
]);

//-------------------------------------------------------------------------------------------------------------------
// start admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

Route::middleware(['auth', 'checkAdmin'])->group(function () {

    Route::get('admin/books/search', [AdminBookController::class, 'search'])->name('books.search');

    //Quản lý sách
    Route::resource('admin/books', AdminBookController::class)
    ->names([
        'index' => 'admin.books.index',
        'create' => 'admin.books.create',
        'edit' => 'admin.books.edit',
        'show' => 'admin.books.show',
        'store' => 'admin.books.store',
        'update' => 'admin.books.update'
        // 'update' => 'admin.books.update'
    ]);
    
    // Route::get('/admin', [AdminController::class, 'countOrder']);


    //Quản lý thể loại
    Route::resource('admin/categories', AdminCategoryController::class)
    ->names([
        'index' => 'admin.categories.index',
        'create' => 'admin.categories.create',
        'edit' => 'admin.categories.edit',
        'show' => 'admin.categories.show',
        'store' => 'admin.categories.store',
        'update' => 'admin.categories.update'
    ]);

    //Quản lý user
    Route::resource('/admin/users', AdminUserController::class)->names([
        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'edit' => 'admin.users.edit',
        'show' => 'admin.users.show',
        'store' => 'admin.users.store',
        'update' => 'admin.users.update'
    ]);

    //Quản lý đơn hàng
    Route::get('admin/orders/search', [AdminOrderController::class, 'search'])->name('orders.search');
    Route::get('admin/orders/search-status', [AdminOrderController::class, 'searchStatus'])->name('orders.search');
    Route::get('admin/orders/date', [AdminOrderController::class, 'date'])->name('orders.date');

    Route::put('admin/orders/{book_order_id}', [AdminOrderController::class, 'updateStatus'])->name('orders.updateStatus');

    Route::resource('/admin/orders', AdminOrderController::class)->names([
        'index' => 'admin.orders.index',
        'create' => 'admin.orders.create',
        'edit' => 'admin.orders.edit',
        'show' => 'admin.orders.show',
        'store' => 'admin.orders.store',
        'update' => 'admin.orders.update',
        // 'destroy' => 'admin.orders.destroy',
    ]);

    //Lọc
    Route::get('admin/orders/filter', ['status'=>'AdminOrderController@index', 'as'=>'admins.orders.index']);
    Route::get('/filter', [AdminOrderController::class, 'filter']);

    //Thống kê
    Route::resource('/admin/statistics/data', AdminStatisticController::class)->names([
        'index' => 'admin.statistics.index',
        
    ]);

    //Thông báo admin
    Route::get('notifications/get', [AdminController::class, 'getNotificationsData'] )
    ->name('notifications.get');





});
//end admin

//-------------------------------------------------------------------------------------------------------------------
// start Users
Route::middleware(['auth'])->group(function () {
    Route::get('/users/accounts/myAccount', [UserController::class, 'index'])->name('users.accounts.index');
    Route::get('/users/accounts/yourOrder', [UserController::class, 'yourOrder'])->name('users.accounts.yourOrder');
    // Route::get('/users/accounts/myWishList', [UserController::class, 'wishList'])->name('users.accounts.wishList');

    Route::resource('/users/accounts/', UserController::class)->names([
        'edit' => 'users.accounts.profile',
        'update' => 'users.accounts.update',
    ]);
    // Route::get('/users/accounts/profile', [UserController::class, 'profile'])->name('users.accounts.profile');
    // Route::post('/users/accounts/profile/{id}', [UserController::class, 'update'])->name('users.accounts.update');

});

Route::get('/contactUs', [UserController::class, 'contactUs'])->name('users.contact');
Route::get('/aboutUs', [UserController::class, 'aboutUs'])->name('users.about');
// end Users

//-------------------------------------------------------------------------------------------------------------------
//Search
Route::get('/search', [BookController::class, 'search']);

//wishlist
Route::middleware(['auth'])->group(function () {
    Route::get('/users/account/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/users', [WishlistController::class, 'store']);
    Route::delete('/users/account/{book_wish_id}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');

});

