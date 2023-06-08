<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Email;
use App\Models\Admin;
use DB;
use Mail;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin.guest');
    }

    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {
        return view('AdminAuth.forgot_password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $rules = [
                'email' => 'required|email',
        ];
        $this->validate($request, $rules);

        $email = $request->input('email');
        $ifexist= Admin::Where('admin_email', $email)->first();
        // $ifexist_manager= Store::Where('email', $email)->first();

        if($ifexist )
        {
            $token = Str::random(64);

            DB::table('admin_password_resets')->insert([
                'email' => $email, 
                'token' => $token, 
                'created_at' => now() 
            ]);

            $email_temp= Email::Where('email_name', "Forgot Password for Admin")->first();
            // return $email_temp->email_subject;
            $email_body= $email_temp->email_body;

            $url = route('reset.password.get.admin', $token);
            $view= "mail.mail_body";
            $find_array = ['{here}'];
            $rep_array = ['<a href="'.$url.'"> Here </a>'];
            $email_body = str_replace($find_array, $rep_array, $email_body);
                // return $email_body;
            $email_data['email_to'] = $email;
            $email_data['email_subject'] = $email_temp->email_subject;
            $email_data['email_message'] = $email_body;

            // return $email_data;
            Email::sendEmail($email_data);

            return redirect('/admin/login')->with('success', 'We have e-mailed your password reset link!');
         
        }
        else{
            return redirect()->back()->with('danger', 'We dont have such email in our record');
           
        }

    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker('admins');
    }
}
