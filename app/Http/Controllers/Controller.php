<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Mail;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //Send Email
    public function sendMail($view = [], $to, $data = [], $subject)
    {
        try {
            Mail::send($view, $data, function ($message) use ($to, $subject) {
                $message->to($to)->subject($subject);
                $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_TITLE'));
            });
            return true;
        } catch (\Exception $e) {
            //dd($e->getMessage());
            //return  $e->getMessage();
            return false;
            return response()->json(['message' => 'Email is not sent']);
        }
    }
}
