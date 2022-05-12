<?php

namespace App\Classes;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Email{
    
    public static function enviar($file, $assunto, $destinatario, $admin = false, $attach = null, $attach_nome = "comprovante_de_compra.pdf"){
        $mail = new PHPMailer(true);

        try {

            // Mail server settings
            $mail->SMTPDebug = 0; // Enable verbose debug output
            $mail->isSMTP(); // Set mailer to use SMTP
            $mail->Host = "email-ssl.com.br"; // Endereço do servidor SMTP
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = 'contato@enafdigital.com.br'; // SMTP username
            $mail->Password = 'Adm@77enaf'; // SMTP password
            $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465;

            $mail->setFrom('contato@enafdigital.com.br', 'Contato - ENAF');
            if($admin){
                // $mail->addAddress("gustavo@agroreserva.com.br"); // Add a recipient, Name is optional
                // $mail->addAddress("gustavo@berrantecomunicacao.com.br"); // Add a recipient, Name is optional
                // $mail->addAddress("guilherme@agroreserva.com.br"); // Add a recipient, Name is optional
                // $mail->addAddress("josevictor@agroreserva.com.br"); // Add a recipient, Name is optional
                // $mail->addAddress("rafael@agroreserva.com.br"); // Add a recipient, Name is optional
                // $mail->addAddress("marcelo@agroreserva.com.br"); // Add a recipient, Name is optional
                // $mail->addAddress("jessica@berrante.digital"); // Add a recipient, Name is optional
                // $mail->addAddress("digital@berrantecomunicacao.com.br"); // Add a recipient, Name is optional
                $mail->addAddress("gusouza980@gmail.com");
            }else{
                $mail->addAddress($destinatario); // Add a recipient, Name is optional
            }
            $mail->addReplyTo('contato@enafdigital.com.br', 'Contato - ENAF');
            // print_r($_FILES['file']); exit;

            if($attach){
                $mail->AddAttachment($attach, $attach_nome);
            }

            $mail->isHTML(true); // Set email format to HTML

            // $file = file_get_contents('site/emails/nova_senha.html');
            // $file = str_replace("{{senha}}", Str::random(6), $file);
            $mail->CharSet = 'UTF-8';
            $mail->Encoding = 'base64';
            
            $mail->Subject = $assunto;
            $mail->Body    = $file;

            // $mail->AltBody = plain text version of your message;

            if( !$mail->send() ) {
                return false;
            } else {
                return true;
            }

        } catch (Exception $e) {
            return false;
        }
    }

}

?>
