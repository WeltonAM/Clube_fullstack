
<?php

function send(array $data){
    $email = new PHPMailer\PHPMailer\PHPMailer;
    $email->CharSet    = 'UTF-8'; 
    $email->SMTPSecure = 'plain';  
    $email->isSMTP();
    $email->Host       = 'smtp.mailtrap.io'; 
    $email->Port       = 465;           
    $email->SMTPAuth   = true;  
    $email->Username   = '83bdf31752799f';      
    $email->Password   = '53b7d2045136ab';      
    $email->isHTML(true);
    $email->setFrom('xande@hotmail.com');
    $email->FromName = $data['quem'];
    $email->addAddress = $data['quem'];
    $email->Body    = $data['mensagem'];
    $email->Subject = $data['assunto'];
    $email->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $email->MsgHTML($data['mensagem']);     
    
    return  $email->send();
}