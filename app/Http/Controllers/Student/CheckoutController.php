<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookOrder;
use App\Models\Categories;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Redirect;
use Session;
use Image;
use Hash;
use Auth;
use DB;
use Stripe;


class CheckoutController extends Controller
{
    //
    public function index()
    {
        return view('student.layout.checkout');
    }

    public function add_address(Request $request)
    {
        // dd($request);
        $rules = [
            'address' => 'required',
            'city' => 'required',
            'payment' => 'required',
        ];
        $this->validate($request, $rules);

        if ($request->input('payment') == 'cash')
        {
            $address = $request->input('address');
            $city = $request->input('city');
            $payment = $request->input('payment');
            $student_id = auth()->user()->id;
            $order_id = rand(11111,99999);

            $data = array(
                    'address' => $address,
                    'city' => $city,
                    'payment_type' => $payment,
                    'student_id' => $student_id,
                    'order_id' => $order_id
                    );

            BookOrder::insert($data);


            $cart = session()->get('cart');
            $total = 0;
                foreach($cart as $new)
                {
                    // return $new['price'];
                    $data = array(
                        'book' => $new['name'],
                        'price' => $new['price'],
                        'quantity' => $new['quantity'],
                        'order_id' => $order_id
                         );

                    OrderDetail::insert($data);

                    $ifexist = Book::where([
                        'id' => $new['book_id']
                         ])->first();

                         $qty = $ifexist->quantity;
                         if($qty > 0)
                         {
                            $new_qty = $qty - $new['quantity'];

                            Book::where('id',$new['book_id'])->update(
                               [
                                   'quantity' => $new_qty,
                               ]);
                         }
                         $total += $new['quantity'] * $new['price'];

                }

            $cart = session()->put('cart', []);

            return redirect('student/books')->with('success', 'Order has been placed!.');
        }

        else{

            $address = $request->input('address');
            session()->put('address',$address);

            $city = $request->input('city');
            session()->put('city',$city);

            $student_id = auth()->user()->id;
            session()->put('student_id',$student_id);

            $payment = $request->input('payment');
            session()->put('payment',$payment);

            return redirect('student/card/info');
        }

    }

    public function card_info()
    {
        return view('student.layout.stripe');
    }
    public function stripe(Request $request)
    {
        $address = session()->get('address');
        $city = session()->get('city');
        $student_id = session()->get('student_id');
        $payment = session()->get('payment');
        $order_id = rand(11111,99999);

        $data = array(
            'address' => $address,
            'city' => $city,
            'payment_type' => $payment,
            'student_id' => $student_id,
            'order_id' => $order_id,
            );

        BookOrder::insert($data);


        $cart = session()->get('cart');
        $total = 0;
            foreach($cart as $new)
            {
                // return $new['price'];
                $data = array(
                    'book' => $new['name'],
                    'price' => $new['price'],
                    'quantity' => $new['quantity'],
                    'order_id' => $order_id
                    );

                OrderDetail::insert($data);

                $ifexist = Book::where([
                    'id' => $new['book_id']
                    ])->first();

                 $qty = $ifexist->quantity;
                 if($qty > 0)
                 {
                    $new_qty = $qty - $new['quantity'];

                    Book::where('id',$new['book_id'])->update(
                       [
                           'quantity' => $new_qty,
                       ]);
                 }

                    $total += $new['quantity'] * $new['price'];
            }

    //   return  intval($total);
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $customer= Stripe\Charge::create ([
                "amount" =>  intval($total) ,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment"
        ]);
        $payment_id= $customer->getLastResponse()->headers["Request-Id"];

        BookOrder::where('id',$order_id)->update(
            [
                'stripe_id' => $payment_id,
            ]);
        Session::forget('cart');
        Session::forget('address');
        Session::forget('student_id');
        Session::forget('city');
        Session::forget('payment');

        return redirect('student/books')->with('success', 'Order has been placed!.');
    }



}
