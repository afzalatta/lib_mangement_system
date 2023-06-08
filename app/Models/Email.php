<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
use Log;

class Email extends Model
{
    use HasFactory;
    protected $table      = 'emails';
    protected $primaryKey = 'id';

    protected $fillable = [
        'email_name', 'email_key', 'email_subject', 'email_from', 'email_body'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'email_key',
    ];

    public function sendEmail($email) 
    {
        try {
            $email['email_footer'] = '';
            $custom_email['from_email']  = env('MAIL_FROM_ADDRESS')?env('MAIL_FROM_ADDRESS'):'info@vasela.com';
            $custom_email['from_name'] = env('MAIL_FROM_NAME')?env('MAIL_FROM_NAME'):'Vasela';

            // $custom_email['from_email']  = 'info@mela.com';
            // $custom_email['from_name'] = 'Mela';
            // Log::info($email);
            Mail::send('mail.mail_body',$email, function ($message) use ($email, $custom_email) {

                $message->from((isset($email['from_email']) ? $email['from_email'] :  $custom_email['from_email']), $name = (isset($email['from_name']) ? $email['from_name'] :  $custom_email['from_name']));

                $message->to($email['email_to'], $email['email_to'])->subject($email['email_subject']);
                
                Log::info('.......Email Sent............');
            });
        }catch (Exception $e) {
            Log::info($e->getMessage());
            echo $e->getMessage();die();
        }
    }

}
