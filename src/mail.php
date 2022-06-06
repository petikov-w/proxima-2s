<?php
file_get_contents('php://input');
$name = POST['name'];
$telefon = POST['telefon'];

print_r($name);
print_r($telefon);

//$to = "developer-krox@yandex.ru"; // адрес куда отправлять письмо
//$subject = "Отправка формы с сайта"; // заголовок письма
//
//$_POST = json_decode(file_get_contents('php://input'), true);
//
//foreach ($_POST as $key => $value) {
//    $fields .= $key . ": " . $value . " \r\n";
//}
//$message = $subject . " \r\n" . $fields;
//$headers = "Content-type:  text/plain; charset=utf-8 \r\n";
//mail($to, $subject, $message, $headers);