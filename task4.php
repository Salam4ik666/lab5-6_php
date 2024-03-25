<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
</head>

<body>
    <h2>Регистрация</h2>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Проверяем, были ли заполнены оба поля
        if (isset($_POST['login']) && isset($_POST['password'])) {
            // Получаем логин и пароль из формы
            $login = $_POST['login'];
            $password = $_POST['password'];

            // Шифруем пароль с помощью функции md5
            $encryptedPassword = md5($password);

            // Формируем строку для записи в файл
            $userData = "$login:$encryptedPassword\n";

            // Открываем файл для записи (или создания, если он не существует)
            $file = fopen('users.txt', 'a+') or die("Невозможно открыть файл!");

            // Записываем данные пользователя в файл
            fwrite($file, $userData);

            // Закрываем файл
            fclose($file);

            // Отправляем пользователю HTTP-код 201 (Created) при успешной регистрации
            http_response_code(201);

            // Выводим сообщение о успешной регистрации
            echo "Пользователь успешно зарегистрирован!";
        } else {
            // Если поля логина или пароля не были отправлены, выводим сообщение об ошибке
            echo "Ошибка: Поля логина и пароля должны быть заполнены!";
        }
    }
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div>
            <label for="login">Логин:</label>
            <input type="text" id="login" name="login" required>
        </div>
        <div>
            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <button type="submit">Зарегистрироваться</button>
        </div>
    </form>
</body>

</html>