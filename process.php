<?php
// Проверяем, была ли отправлена форма
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);

    // Проверяем, что все поля заполнены
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Адрес, на который будут отправляться сообщения
        $to = "ilnaricnic@gmail.com"; // Замените на ваш адрес электронной почты

        // Тема сообщения
        $subject = "Сообщение с вашего сайта";

        // Сообщение
        $email_message = "<strong>Имя:</strong> $name\n";
        $email_message .= "<strong>Email:</strong> $email\n";
        $email_message .= "<strong>Сообщение:</strong>\n$message\n";

        // Дополнительные заголовки
        $headers = "From: $name <$email>\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8\r\n";

        // Отправляем сообщение
        if (mail($to, $subject, $email_message, $headers)) {
            // Если сообщение отправлено успешно, отправляем ответ клиенту
            echo "Ваше сообщение было успешно отправлено!";
        } else {
            // Если произошла ошибка при отправке сообщения
            http_response_code(500);
            echo "Что-то пошло не так. Сообщение не было отправлено.";
        }
    } else {
        // Если не все поля формы были заполнены
        http_response_code(400);
        echo "Пожалуйста, заполните все поля формы.";
    }
} else {
    // Если запрос не является POST запросом
    http_response_code(403);
    echo "Доступ запрещен.";
}
?>
