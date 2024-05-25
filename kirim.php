<?php
require 'vendor/autoload.php'; 
// Include Composer's autoload file
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['kirim']) && $_POST['kirim']) {
    $mail = new PHPMailer();
    $mail->SMTPDebug = 0; //Enable verbose debug output
    $mail->isSMTP(); //Send using SMTP
    $mail->Host = 'ssl://smtp.gmail.com'; //Set the SMTP server to send through
    $mail->SMTPAuth = true; //Enable SMTP authentication
    $mail->Username = 'ilhamadipurnomo9g@gmail.com'; //SMTP username
    $mail->Password = 'tuow vyte jfqz zxuy'; //SMTP password
    $mail->SMTPSecure = "ssl"; //Enable implicit TLS encryption
    $mail->Port = 465;

    $mail->setFrom($mail->Username, 'Pengunjung');
    $mail->addAddress($_POST["email"]);

    $mail->isHTML(true);
    $mail->Subject = $_POST['subject'];
    $mail->Body = $_POST["pesan"];

    if (!$mail->send()) {
        echo "<script>
                alert('Pesan Tidak terkirim');
                document.location.href='index.php';
              </script>" . $mail->ErrorInfo;
    } else {
        echo "<script>
                alert('Pesan berhasil terkirim');
                document.location.href='index.php';
              </script>";
    }
}