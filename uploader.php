<?php

$name = $_POST["nameFF"];
$class = $_POST["contactFF"];
$message = $_POST["messageFF"];
require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();

$mail->Host = 'smtp.mail.ru';
$mail->SMTPAuth = true;
$mail->Username = 'v.grabko99@mail.ru'; // логин от вашей почты
$mail->Password = 'pars'; // пароль от почтового ящика
$mail->SMTPSecure = 'ssl';
$mail->Port = '465';

$mail->CharSet = 'UTF-8';
$mail->From = 'v.grabko99@mail.ru'; // адрес почты, с которой идет отправка
$mail->FromName = 'boot'; // имя отправителя
$mail->addAddress('v.grabko99@gmail.com', 'Имя');


$mail->isHTML(true);

$mail->Subject = $name;
if (isset($_FILES['fileFF'])) {
    if ($_FILES['fileFF']['error'][0] == 0) {
        $mail->AddAttachment($_FILES['fileFF']['tmp_name'][0], $_FILES['fileFF']['name'][0]);
    }
}
$mail->Body = "Ученик: $name <br>"
        . "Класс: $class<br>"
        . "Сообщение: $message";


// $mail->SMTPDebug = 1;

if ($mail->send()) {
    echo 'Письмо отправлено';
} else {
    echo 'Письмо не может быть отправлено. ';
    echo 'Ошибка: ' . $mail->ErrorInfo;
}




//$mail->addAttachment($_FILES["fileFF"]["tmp_name"][0], $_FILES["fileFF"]["name"][0]);


