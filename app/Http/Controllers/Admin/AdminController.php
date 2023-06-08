<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Admin;
use App\Models\Email;
use Redirect;
use Image;
use Session;
use Hash;
use Auth;
use Vinkla\Hashids\Facades\Hashids;

class AdminController extends Controller
{
    public function admin_edit_view()
        {
            return view('admin.admin.edit_admin' );
        }

    public function admin_list()
        {
            $admins = Admin::all();
            return view('admin.admin.list' , compact('admins'));
        }

    public function add_admin_view()
        {
            return view('admin.admin.add_admin');
        }

    public function add_admin(Request $request)
        {
            $rules = [
                'email' => 'required',
                'name' => 'required',
            ];
            $this->validate($request, $rules);

            if($request->file('image') )
                {
                    $image = $request->file('image');
                    $input['photo'] = time().'.'.$image->extension();

                    $filePath = public_path('/uploads/admin/thumbs');

                    $img = Image::make($image->path());
                    $img->resize(200, 200, function ($const) {
                        $const->aspectRatio();
                    })->save($filePath.'/'.$input['photo']);

                    $filePath = public_path('/uploads/admin');
                    $image->move($filePath, $input['photo']);

                    $images= $input['photo'];

                }
                else{
                    $images= '';
                }

            $password = rand(1111,9999);
            $hashed=Hash::make($password);

            $name = $request->input('name');
            $email = $request->input('email');

            $data = array(
                'admin_name' => $name,
                'admin_email' => $email,
                'password' => $hashed,
                'logo' => $images,
                 );

            Admin::insert($data);

            $email_temp= Email::Where('email_key', "add_admin")->first();
            $email_body= $email_temp->email_body;

            $url = route('admin.login');

            $view= "mail.mail_body";
            $find_array = ['{name}','{email}','{password}','{link}'];
            $rep_array = ["$name","$email","$password",'<a href="'.$url.'">Click Here </a>'];
            $email_body = str_replace($find_array, $rep_array, $email_body);

            $email_data['email_to'] = $email;
            $email_data['email_subject'] = $email_temp->email_subject;
            $email_data['email_message'] = $email_body;

            Email::sendEmail($email_data);

            Session::flash('success', 'Admin Added');
            return redirect('admin/list');
        }

    public function edit_admin_view($id)
        {
            $encoded_id = $id;
            $id = Hashids::decode($id)[0];

            $admin = Admin::where('id',$id)->first();
            return view('admin.admin.edit_admin_view', compact('admin'));
        }

    public function edit_view_admin(Request $request, $id)
        {
            $rules = [
                'email' => 'required',
                'name' => 'required',
            ];
            $this->validate($request, $rules);

            $encoded_id = $id;
            $id = Hashids::decode($id)[0];

            if($request->file('image') )
                {
                    $image = $request->file('image');
                    $input['photo'] = time().'.'.$image->extension();

                    $filePath = public_path('/uploads/admin/thumbs');

                    $img = Image::make($image->path());
                    $img->resize(200, 200, function ($const) {
                        $const->aspectRatio();
                    })->save($filePath.'/'.$input['photo']);

                    $filePath = public_path('/uploads/admin');
                    $image->move($filePath, $input['photo']);

                    $images= $input['photo'];
                    Admin::where('id', $id)
                        ->update([
                        'logo' =>  $images
                    ]);
                }

            $name = $request->input('name');
            $email = $request->input('email');

            Admin::where('id',$id)->update(
                [
                    'admin_name'=> $name,
                    'admin_email'=> $email,
                ]);
            Session::flash('success', 'Admin Edited ');
            return redirect('admin/list');
        }

    public function edit_admin(Request $request)
        {
            $rules = [

                'name' => 'required',
            ];
            $this->validate($request, $rules);

            $id=Auth::user()->id;

            if($request->file('image') )
                {
                    $image = $request->file('image');
                    $input['photo'] = time().'.'.$image->extension();

                    $filePath = public_path('/uploads/admin/thumbs');

                    $img = Image::make($image->path());
                    $img->resize(200, 200, function ($const) {
                        $const->aspectRatio();
                    })->save($filePath.'/'.$input['photo']);

                    $filePath = public_path('/uploads/admin');
                    $image->move($filePath, $input['photo']);

                    $images= $input['photo'];
                    Admin::where('id', $id)
                        ->update([
                        'logo' =>  $images
                    ]);
                }

            $name = $request->input('name');

            Admin::where('id',$id)->update(
                [
                    'admin_name'=> $name,
                ]);
                Session::flash('success', 'Admin Edited ');
            return redirect()->back();
        }

    public function edit_password_view()
        {
            return view('admin.admin.password_change' );
        }

    public function edit_password(Request $request)
        {
            $rules = [

                'current_password' => 'required',
                'new_password' => 'required',
                'confirm_password' => 'required',
            ];
            $this->validate($request, $rules);

            $current_pass = $request->input('current_password');
            $new_pass = $request->input('new_password');
            $confirm_pass = $request->input('confirm_password');
                // return Hash::make($current_pass);
            $company_email= Auth::user()->admin_email;

            $current_Password= Admin::where([
                'admin_email' => $company_email,

                ])
                ->first();
                //   return $current_Password->password;
                if(\Hash::check($current_pass , $current_Password->password ))
                    {
                        if($new_pass== $confirm_pass )
                            {
                                //   return "done";
                                $user = Admin::where('admin_email', $company_email)
                                ->update(['password' => bcrypt($new_pass)]);
                            }
                        else
                            {
                                Session::flash('danger', 'Confirmed Pass not Correct');
                                return redirect()->back();
                            }
                    }
                else
                    {
                        Session::flash('danger', 'Current Password Mismatched');
                        return redirect()->back();
                    }

                Auth::guard('admin')->logout();

                return redirect('/admin/login')->with('success', 'Your password has been changed!');
        }

    public function delete_admin($id)
        {
            $encoded_id = $id;
            $id = Hashids::decode($id)[0];

            $ifexist = Admin::where([
            'id' => $id
             ])->delete();

             Session::flash('success', 'Admin Deleted!');
             return redirect('/admin/list');
        }
}
