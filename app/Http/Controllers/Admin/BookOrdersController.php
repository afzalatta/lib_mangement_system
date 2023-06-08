<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\BookOrder;
use Redirect;
use Session;

class BookOrdersController extends Controller
{
    public function order_list()
        {
            $all_orders = BookOrder::orderBy('id', 'desc')->get();
            // return $all_orders;
            return view('admin.book_orders.order_list' , compact('all_orders'));
        }

    public function status(Request $request ,$id)
        {
            $status_id = $request->status;

            if($status_id!='')
                {
                    BookOrder::where(['id'=>$id])->update(['status' =>  $status_id ]);
                    Session::flash('success', 'Status has been changed ');
                }

            return redirect('/admin/orders');
        }

    public function delete_order($id)
        {
            $ifexist = BookOrder::where([
            'id' => $id
             ])->delete();

             Session::flash('success', 'Order Deleted!');
             return redirect('/admin/orders');
        }

}
