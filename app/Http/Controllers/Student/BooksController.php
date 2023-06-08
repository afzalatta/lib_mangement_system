<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Categories;
use App\Models\Publisher;
use App\Models\Author;
use App\Models\BookStatus;
use App\Models\OrderDetail;
use Redirect;
use Session;
use Image;
use Hash;
use Auth;


class BooksController extends Controller
{
    //

    public function index(Request $request)
    {
        $keyword = "";
        $books = Book::orderBy('id', 'desc')->get();
        if ($request->has('search')) {
            $keyword = $request->input('search');
            $books = Book::where('name', 'like', '%' . $request->get('search') . '%')->orderBy('id', 'desc')->get();
         }



        return view('student.home', compact('books'));
    }

    public function bookDetail($id){
        // $book= Book::find($id);
         $book = Book::with(['category', 'author', 'publisher'])->where('id', $id)->first();
        // return Categories::with(['publisher'])->get();
        return view('student.books.book_detail', compact('book'));


    }

    public function myContact()
    {
        return view('student.layout.contact');
    }

    public function aboutUs()
    {
        return view('student.layout.about');
    }

    public function filter( Request $request, $keyword)
    {
        // $search = $request['search']?? "" .$keyword;
        $search = $request->input('keyword');
        return view($search);
        dd($search);
    }

    public function cart()
    {
        return view('student.layout.cart');
    }

        /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart(Request $request)
    {

        $id= $request->id;
        $product = Book::findOrFail($id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = array(
                "book_id" => $product->id,
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
                 );


        }

        session()->put('cart', $cart);

       $count= count((array) session('cart'));

        // return redirect()->back()->with('success', 'Product added to cart successfully!');
        return response()->json(['success'=>true,'count'=>$count]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            // session()->sflash('success', 'Cart updated successfully');
            // return   session()->get('cart', $cart);

            return response()->json(['success'=>true,'result'=>$cart]);

        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            $count= count((array) session('cart'));
            return response()->json(['success'=>true,'result'=>$cart,'count'=>$count]);
            // session()->flash('success', 'Product removed successfully');
        }
    }
}
