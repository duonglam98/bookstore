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

use App\Http\Controllers\Admins\AdminController;
use App\Http\Controllers\Admins\AdminBookController;
use App\Http\Controllers\Admins\AdminCategoryController;


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
    // $user = auth()->user();
    $books = Book::latest()->paginate(5);
    $category = Category::get();
    $data = [
        'user' => $user,
        'books' => $books,
        'category' => $category,
    ];
    return view('/books/index', $data);
});

// Route::middleware(['auth:sanctum', 'verified'])
// ->get('/books', [BookController::class, 'index'])->name('books.index');

Route::get('/books', [BookController::class, 'index'])->name('books.index');
//-------------------------------------------------------------------------------------------------------------------
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.detail');

// end books

//-------------------------------------------------------------------------------------------------------------------
//start category
// Route::get('books/categories/{id}', [CategoryController::class, 'show'])->name('books.categories');
// Route::get('books/categories/{subName}', [CategoryController::class, 'viewBook'])->name('books.categories');
//end category

//-------------------------------------------------------------------------------------------------------------------
// start orders
Route::middleware(['auth'])->group(function () {
    Route::post('/orders/checkout', [OrderController::class, 'checkout'])->name('orders.payment');
    Route::get('/orders/CheckOut', [OrderController::class, 'checkOutCart'])->name('orders.checkOut');
    Route::post('/orders', [OrderController::class, 'store']);
    Route::get('/orders/cart', [OrderController::class, 'index'])->name('orders.cart');
    Route::delete('/orders/{book_orders_id}', [OrderController::class, 'destroy'])->name('orders.destroy');
    Route::put('/orders/{book_orders_id}', [OrderController::class, 'update'])->name('orders.update');
    Route::get('orders/sendMail', [OrderController::class, 'sendMail'])->name('orders.sendMail');    
});
// end orders

//-------------------------------------------------------------------------------------------------------------------
// start admin
Route::middleware(['auth', 'checkAdmin'])->group(function () {
    //Quản lý sách
    Route::resource('admin/books', AdminBookController::class)
    ->names([
        'index' => 'admin.books.index',
        'create' => 'admin.books.create',
        'edit' => 'admin.books.edit',
        'show' => 'admin.books.show',
        'store' => 'admin.books.store',
        'update' => 'admin.books.update'
    ]);

    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

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
});
//end admin



//-------------------------------------------------------------------------------------------------------------------
// start Users
Route::middleware(['auth'])->group(function () {
    Route::get('/users/myAccount', [UserController::class, 'index'])->name('users.index');

});

Route::get('/users/contactUs', [UserController::class, 'contactUs'])->name('users.contact');
Route::get('/users/about', [UserController::class, 'aboutUs'])->name('users.about');
// end Users

//--------------------------------------------------------------------------------------------------------------------
//file-manager
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


//-------------------------------------------------------------------------------------------------------------------
//Search
Route::get('/search', [BookController::class, 'search']);
