<?php

namespace App\Services\EmailService;

class SmtpEmailService implements EmailService{
    public function sendTextEmail($to, $subject, $content): void {

    }

    public function sendHtmlEmail($to, $subject, $content){
        //TODO add template engine to this method
    }
}
