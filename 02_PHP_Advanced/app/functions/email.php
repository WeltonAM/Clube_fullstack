
<?php

function send(array $data){
    $email = new PHPMailer\PHPMailer\PHPMailer;
    $email->CharSet    = 'UTF-8'; 
    $email->SMTPSecure = 'plain';  
    $email->isSMTP();
    $email->Host       = 'smtp.mailtrap.io'; 
    $email->Port       = 465;           
    $email->SMTPAuth   = true;  
    $email->Username   = '512bf67bbc891e';      
    $email->Password   = 'e9591bd8a9c5cd';      
    $email->isHTML(true);
    $email->setFrom('xandecar@hotmail.com');
    $email->FromName = $data['quem'];
    $email->addAddress = $data['para'];
    $email->Body    = $data['mensagem'];
    $email->Subject = $data['assunto'];
    $email->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $email->MsgHTML($data['mensagem']);     
    
    return $email->send();

}