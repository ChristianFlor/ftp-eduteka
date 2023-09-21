<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



function enviarCorreo($nombre, $msj, $correo, $asunto){

require '/home/edutek/www/lib/phpmailer/phpmailer/src/Exception.php';
require '/home/edutek/www/lib/phpmailer/phpmailer/src/PHPMailer.php';
require '/home/edutek/www/lib/phpmailer/phpmailer/src/SMTP.php';


//Load Composer's autoloader
//require '/home/edutek/www/lib/vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'localsmtp.icesi.edu.co';                    // Specify main and backup SMTP servers
    $mail->SMTPAuth = false;                               // Enable SMTP authentication
    //$mail->Username = 'inscripcion@eventoeduteka.com';    // SMTP username
    //$mail->Password = 'r3002045';                         // SMTP password
    $mail->SMTPSecure = false;                            // Enable TLS encryption, `ssl` also accepted       
    $mail->SMTPAutoTLS = false;
    $mail->SMTPSecure = false;
    $mail->Port = 25;                                    // TCP port to connect to 

    //Recipients
    $mail->setFrom('eduteka@iceis.edu.co', 'Eduteka innovacion y TIC');
    $mail->addAddress('etovar@icesi.edu.co', $nombre);     //Add a recipient
/*     $mail->addCC('dpastrana@icesi.edu.co');
    $mail->addCC('jclopez@icesi.edu.co');
     */
    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $asunto;
    $mail->Body    = $msj;
    

    $mail->send();
    //echo 'Message has been sent';
    return 1;
} catch (Exception $e) {
    //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    return 0;
}

}


?>
