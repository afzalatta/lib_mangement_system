<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Publisher;
use Redirect;
use Session;
use Hash;
use Auth;

class PublisherController extends Controller
{
    public function publisher_list()
        {
            $all_publishers = Publisher::orderBy('id', 'desc')->get();
            return view('admin.publisher.publisher_list' , compact('all_publishers'));
        }

    public function add_publisher_view()
        {
            return view('admin.publisher.add_publisher' );
        }

    public function add_publisher(Request $request)
        {
            $rules = [
                'name' => 'required',
            ];
            $this->validate($request, $rules);

            $name = $request->input('name');

            $data = array(
                'name' => $name
                );

                Publisher::insert($data);


            Session::flash('success', 'Publisher Added');
            return redirect('admin/publishers');
        }

    public function edit_publisher_view($id)
        {
            $publisher = Publisher::where('id',$id)->first();
            return view('admin.publisher.edit_publisher', compact('publisher'));
        }

    public function edit_publisher(Request $request, $id)
        {
            $rules = [
                'name' => 'required'
            ];
            $this->validate($request, $rules);

            $name = $request->input('name');

            Publisher::where('id',$id)->update(
                [
                    'name' => $name
                ]);
            Session::flash('success', 'Publisher Edited ');
            return redirect('admin/publishers');
        }

    public function delete_publisher($id)
        {
            $ifexist = Publisher::where([
            'id' => $id
            ])->delete();

            Session::flash('success', 'Publisher Deleted!');
            return redirect('/admin/publishers');
        }
}
