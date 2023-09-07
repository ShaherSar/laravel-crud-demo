<?php

namespace App\Services\EmailService;

interface EmailService{
    public function sendTextEmail($to, $subject, $content);

    public function sendHtmlEmail($to, $subject, $content);
}
