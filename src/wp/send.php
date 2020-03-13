<?php

$data = file_get_contents('php://input');
$data = json_decode($data, 1);

function clear ($value) {
    $value = trim($value);
    $value = htmlspecialchars($value);
    return $value;
}
// $to  = "info@esm.media"; 
$to  = "info@esm.media"; 
$subject = "Форма обратной связи с сайта esm.center"; 
$message = " <p>Содержание формы</p> \r\n<br> <b>Имя: </b>".clear($data["name"])."\r\n<br><b>Телефон: </b>".clear($data["phone"])."\r\n<br><b>Сообщение: </b>".clear($data["message"])."\r\n";

$headers  = "Content-type: text/html; charset=utf-8 \r\n"; 
$headers .= "From: Сайт esm.center <info@esm.center>\r\n"; 
$headers .= "Reply-To: reply-to@esm.center\r\n"; 

$result = mail($to, $subject, $message, $headers); 
echo $result;
?>