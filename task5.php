<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration and Login</title>
</head>

<body>

    <?php
    // Проверка, была ли отправлена форма регистрации
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
        // Обработка регистрации
        if (isset($_POST['login']) && isset($_POST['password'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];

            // Шифрование пароля с помощью md5
            $encryptedPassword = md5($password);

            // Сохранение данных пользователя в файл users.txt
            $userData = "$login:$encryptedPassword\n";
            file_put_contents('users.txt', $userData, FILE_APPEND | LOCK_EX);

            // Отправка HTTP-кода 201 (Created) при успешной регистрации
            http_response_code(201);
            echo "Registration successful!";
        } else {
            echo "Error: All fields are required for registration!";
        }
    }

    // Проверка, была ли отправлена форма авторизации
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
        // Обработка авторизации
        if (isset($_POST['login']) && isset($_POST['password'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];

            $users = file('users.txt', FILE_IGNORE_NEW_LINES);

            $userFound = false;
            foreach ($users as $user) {
                $userData = explode(":", $user);
                if ($userData[0] === $login && md5($password) === $userData[1]) {
                    $userFound = true;
                    break;
                }
            }

            if ($userFound) {
                // Перенаправление пользователя на страницу с изображениями
                header("Location: images.php");
                exit;
            } else {
                echo "Error: Incorrect login or password.";
            }
        } else {
            echo "Error: All fields are required for login!";
        }
    }
    ?>

    <h2>Registration</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div>
            <label for="reg_login">Login:</label>
            <input type="text" id="reg_login" name="login" required>
        </div>
        <div>
            <label for="reg_password">Password:</label>
            <input type="password" id="reg_password" name="password" required>
        </div>
        <div>
            <button type="submit" name="register">Register</button>
        </div>
    </form>

    <h2>Login</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div>
            <label for="login_login">Login:</label>
            <input type="text" id="login_login" name="login" required>
        </div>
        <div>
            <label for="login_password">Password:</label>
            <input type="password" id="login_password" name="password" required>
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
    </form>

</body>

</html>