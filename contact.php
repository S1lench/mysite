<?php
if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    $to = "ilnaricnic@gmail.com"; // Замените на ваш электронный адрес
    $subject = "Сообщение с контактной формы";
    $body = "Имя: $name\nEmail: $email\nСообщение:\n$message";
    
    if(mail($to, $subject, $body)) {
        echo "Ваше сообщение успешно отправлено!";
    } else {
        echo "Ошибка при отправке сообщения. Пожалуйста, попробуйте позже.";
    }
}
?>
