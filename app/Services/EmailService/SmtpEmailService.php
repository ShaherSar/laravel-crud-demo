<?php

namespace App\Services\EmailService;

class SmtpEmailService implements EmailService{
    public function sendTextEmail($to, $subject, $content): void {
        mail($to, $subject, $content);
    }

    public function sendHtmlEmail($to, $subject, $content){
        //TODO add template engine to this method
    }
}
