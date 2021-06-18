<?php

use Illuminate\Support\Facades\Route;
use App\Models\Book;
use App\Http\Controllers\BookController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
use App\http\Controllers\SignController;

use App\Http\Controllers\Admins\AdminController;
use App\Http\Controllers\Admins\BookController as AdminProductController;

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

    return view('homepage', ['user' => $user]);
});

Route::get('/', function () {
    $user = Auth::user();
    $books = Book::paginate(1);
    return view('index', ['user' => $user], ['books' => $books]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $user = Auth::user();
    $books = Book::paginate(1);
    return view('dashboard', ['user' => $user], ['books' => $books]);
})->name('dashboard');

//-------------------------------------------------------------------------------------------------------------------
// start books
Route::middleware(['auth:sanctum', 'verified', 'checkAdmin'])->group(function () {
    Route::get('/books/create', [BookController::class, 'create']);
    Route::post('/books', [BookController::class, 'store']);
});

Route::resource('books', BookController::class)->except([
    'create', 'store'
]);

Route::get('/books', [BookController::class, 'index'])->name('books.index');


// end books

//-------------------------------------------------------------------------------------------------------------------
// start orders
Route::middleware(['auth'])->group(function () {
    Route::post('/orders/checkout', [OrderController::class, 'checkout']);
    Route::post('/orders', [OrderController::class, 'store']);
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.cart');
    Route::delete('/orders/{book_orders_id}', [OrderController::class, 'destroy'])->name('orders.destroy');
    Route::put('/orders/{book_orders_id}', [OrderController::class, 'update'])->name('orders.update');
    Route::get('/send-markdown-mail', [OrderController::class, 'sendOrderMail'])->name('orders.sendMail');
    
});
// end orders

//-------------------------------------------------------------------------------------------------------------------
// start admin
Route::middleware(['auth', 'checkAdmin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/books', [AdminProductController::class, 'index'])->name('admin.books.index');
    Route::get('/admin/books/create', [AdminProductController::class, 'create'])->name('admin.books.create');
    Route::post('/admin/books', [AdminProductController::class, 'store'])->name('admin.books');
    Route::get('/admin/categories', [AdminProductController::class, 'index'])->name('admin.books.index');

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

//-------------------------------------------------------------------------------------------------------------------
//start category
Route::get('/categories/newbook', function() {
    $user = Auth::user();    
    return view('categories.newbook', ['user' => $user]);
}) ->name('categories.newbook');

Route::get('/categories/textbook', function() {
    $user = Auth::user();
    $books = Book::paginate(1);
    return view('categories.textbook', ['user' => $user]);
}) ->name('categories.textbook');

Route::get('/categories/domestic', function() {
    $user = Auth::user();
    $books = Book::paginate(1);
    return view('categories.domestic', ['user' => $user]);
}) ->name('categories.domestic');

Route::get('/categories/foreign', function() {
    $user = Auth::user();
    $books = Book::paginate(1);
    return view('categories.foreign', ['user' => $user]);
}) ->name('categories.foreign');

Route::get('/categories/economy', function() {
    $user = Auth::user();
    $books = Book::paginate(1);
    return view('categories.economy', ['user' => $user]);
}) ->name('categories.economy');

Route::get('/categories/dictionary', function() {
    $user = Auth::user();
    $books = Book::paginate(1);
    return view('categories.dictionary', ['user' => $user]);
}) ->name('categories.dictionary');
//end category