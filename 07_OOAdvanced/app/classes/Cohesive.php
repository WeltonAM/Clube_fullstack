<?php

use PHPMailer\PHPMailer\PHPMailer;

abstract class Checkout
{
    protected $paymentInfo;

    public function setPaymentInfo($paymentInfo)
    {
        $this->paymentInfo = $paymentInfo;
    }

    abstract public function pay();
}

class PaypalCheckout extends Checkout
{
    public function pay()
    {
        return 'Checkout';
    }
}

abstract class EmailConfig
{
    protected PHPMailer $mailer;

    public function config()
    {
        $this->mail = new PHPMailer(true);                  
        $this->mail->isSMTP();                                            
        $this->mail->Host       = 'smtp.mailtrap.io';                     
        $this->mail->SMTPAuth   = true;                                   
        $this->mail->Username   = 'b36477ba9a9f2e';                     
        $this->mail->Password   = '0d7225b9471ce9';                               
        // $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
        $this->mail->Port       = 465;                                   
    }

    abstract public function send($data);
}

class EmailCheckout extends EmailConfig
{
    public function send($data)
    {
        $this->config();
        //Recipients
        $this->mail->setFrom($data->from, $data->fromName);
        $this->mail->addAddress($data->to, $data->toName);     
        $this->mail->addAddress('ellen@example.com');               
        $this->mail->isHTML(true);                                  
        $this->mail->Subject = $data->subject;
        $this->mail->Body    = $data->body;
        $this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        return $this->mail->send() ? 'Email sent' : 'Error to send email'.$this->mail->ErrorInfo;
    }
}

$checkout = new PaypalCheckout;
echo $checkout->pay().PHP_EOL;

$email = new EmailCheckout;

$dataCheckout = new stdClass;
$dataCheckout->from = 'xandecar@hotmail.com';
$dataCheckout->fromName = 'Alexandre';
$dataCheckout->to = 'xandecar@hotmail.com';
$dataCheckout->toName = 'Johny';
$dataCheckout->subject = 'Email test';
$dataCheckout->body = 'Message test';
var_dump($dataCheckout);