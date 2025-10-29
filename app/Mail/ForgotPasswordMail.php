<?php 

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotPasswordMail extends Mailable {
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user){
        $this->user = $user;
    }

    public function build(){
        return $this->markdown('admin.pages.forgot_feedback')
                    ->with([
                        'user' => $this->user
                    ])
                    ->subject(config('app.name') . ', Forgot Password');
    }
    
}
