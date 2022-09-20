<?php

class Email 
{
    public function send():object
    {
        return new class{
            public function sendEmail()
            {
                return 'send email';
            }
        };
    }
}

$email = new Email();
var_dump($email->send());
