<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Student;
use App\Models\Email;
use Redirect;
use Session;
use Hash;
use Auth;

class StudentController extends Controller
{
    public function student_list()
        {
            $all_students = Student::orderBy('id', 'desc')->get();
            return view('admin.students.student_list' , compact('all_students'));
        }

    public function add_student_view()
        {
            return view('admin.students.add_student' );
        }

    public function add_student(Request $request)
        {
            $rules = [
                'name' => 'required',
                'email' => 'required',
                'age' => 'required',
                'gender' => 'required',
                'phone' => 'required',
                'class' => 'required',
                'address' => 'required',
            ];
            $this->validate($request, $rules);

            $password = rand(1111,9999);
            $hashed=Hash::make($password);

            $name = $request->input('name');
            $email = $request->input('email');
            $age = $request->input('age');
            $address = $request->input('address');
            $phone = $request->input('phone');
            $gender = $request->input('gender');
            $class = $request->input('class');

            $data = array(
                'name' => $name,
                'email' => $email,
                'password' => $hashed,
                'age' => $age,
                'address' => $address,
                'phone' => $phone,
                'class' => $class,
                'gender' => $gender,
                 );

                 Student::insert($data);

            $email_temp= Email::Where('email_key', "add_student")->first();
            $email_body= $email_temp->email_body;

            $url = route('students.login');

            $view= "mail.mail_body";
            $find_array = ['{name}','{email}','{password}','{link}'];
            $rep_array = ["$name","$email","$password",'<a href="'.$url.'">Click Here </a>'];
            $email_body = str_replace($find_array, $rep_array, $email_body);

            $email_data['email_to'] = $email;
            $email_data['email_subject'] = $email_temp->email_subject;
            $email_data['email_message'] = $email_body;

            Email::sendEmail($email_data);

            Session::flash('success', 'Student Added');
            return redirect('admin/students');
        }

    public function edit_student_view($id)
        {
            $student = Student::where('id',$id)->first();
            return view('admin.students.edit_student', compact('student'));
        }

    public function edit_student(Request $request, $id)
        {
            $rules = [
                'name' => 'required',
                'email' => 'required',
                'age' => 'required',
                'gender' => 'required',
                'phone' => 'required',
                'class' => 'required',
                'address' => 'required',
            ];
            $this->validate($request, $rules);

            $name = $request->input('name');
            $email = $request->input('email');
            $age = $request->input('age');
            $address = $request->input('address');
            $phone = $request->input('phone');
            $gender = $request->input('gender');
            $class = $request->input('class');

            Student::where('id',$id)->update(
                [
                    'name' => $name,
                    'email' => $email,
                    'age' => $age,
                    'address' => $address,
                    'phone' => $phone,
                    'class' => $class,
                    'gender' => $gender,
                ]);
            Session::flash('success', 'Student Edited ');
            return redirect('admin/students');
        }

    public function delete_student($id)
        {
            $ifexist = Student::where([
            'id' => $id
             ])->delete();

             Session::flash('success', 'Student Deleted!');
             return redirect('/admin/students');
        }
}
