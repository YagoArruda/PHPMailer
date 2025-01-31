<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './vendor/autoload.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];


    $mail = new PHPMailer(true);
    
try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                    
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;                                
    $mail->Username   = 'apresentacao0101@gmail.com';//email para uso nos testes             
    $mail->Password   = 'tolf wjjl npuf isog';                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;     
    $mail->Port       = 465;                                  

    $mail->setFrom($email, $nome);
    $mail->addAddress($email, $nome);

    $mail->isHTML(true);                         
    $mail->Subject = "Mensagem de: " . $nome . " - " . $telefone;
    $mail->Body    = "<span>Nome: " . $nome . "</span><br>" . "<span>Telefone: " . $telefone . "</span><br>" . "E-mail: " . $email . "<br>" . "Mensagem: " . $mensagem;
    $mail->AltBody = "<span>Nome: " . $nome . "</span><br>" . "<span>Telefone: " . $telefone . "</span><br>" . "E-mail: " . $email . "<br>" . "Mensagem: " . $mensagem;

    $mail->send();
    echo 'Email enviado';
} catch (Exception $e) {
    echo "Erro";//: {$mail->ErrorInfo} não enviar erro para o usuario
}

}
