<?php

use App\Models\Book;
use App\Http\Controllers\Student\BooksController;
use App\Http\Controllers\Student\CategoryController;
use App\Http\Controllers\Student\CheckoutController;


Route::get('/', function ($keyword) {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('student')->user();

    dd($keyword);
    $books = Book::orderBy('id', 'desc')->get();
    return view('student.home', compact('books'));
})->name('home');


Route::group([ 'domain' => env('APP_DOMAIN')], function () {
    //
    Route::get('/home/{id?}',[BooksController::class,'index'])->name('index');
    Route::get('/book/{id}',[BooksController::class,'bookDetail'])->name('book_detail');
    Route::get('/category/{id}',[CategoryController::class,'categoryDetail'])->name('category.show');

});

Route::get('/contact',[BooksController::class,'myContact']);
Route::get('/about',[BooksController::class,'aboutUs']);

Route::get('home/search/{keyword}',[BooksController::class,'filter']);


Route::get('/cart', [BooksController::class, 'cart'])->name('cart');
Route::post('/add-to-cart', [BooksController::class, 'addToCart'])->name('add.to.cart');
Route::patch('/update-cart', [BooksController::class, 'update'])->name('update.cart');
Route::delete('/remove-from-cart', [BooksController::class, 'remove'])->name('remove.from.cart');

Route::get('/checkout', [CheckoutController::class, 'index']);
Route::post('/checkout/address', [CheckoutController::class, 'add_address']);

Route::get('/card/info', [CheckoutController::class, 'card_info']);
Route::post('/stripe', [CheckoutController::class, 'stripe']);
