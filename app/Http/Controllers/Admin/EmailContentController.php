<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Email;
use Redirect;
use Session;
use Hash;
use Auth;
use Vinkla\Hashids\Facades\Hashids;

class EmailContentController extends Controller
{
    public function template_list()
        {
            $all_page = Email::all();
            return view('admin.email_template.template_list' , compact('all_page'));
        }

    public function edit_template_view($id)
        {
            $encoded_id = $id;
            $id = Hashids::decode($id)[0];

            $ifexist = Email::where([
                'id' => $id
            ])->first();

            return view('admin.email_template.edit_template',compact('ifexist'));
        }

        public function edit_template(Request $request,$id)
        {
            $rules = [
                'name' => 'required',
                'subject' => 'required',
                'content' => 'required',
            ];
            $this->validate($request, $rules);

            $encoded_id = $id;
            $id = Hashids::decode($id)[0];

            $input = $request->all();

            $data = array(
                'email_name' =>$request->input('name'),
                'email_subject' =>$request->input('subject'),
                'email_body' =>$request->input('content'),
                    );
                Email::where('id', $id)->update($data);

            Session::flash('success', 'Email Template Updated ');
            return redirect('/admin/email_templates');

        }

    public function delete_template($id)
        {
            $encoded_id = $id;
            $id = Hashids::decode($id)[0];

            $ifexist = Email::where([
            'id' => $id
             ])->delete();

             Session::flash('success', 'Email Template Deleted!');
            return redirect()->back();
        }

}
