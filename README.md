# Лабораторная работа №5-6

- [Лабораторная работа №5-6](#лабораторная-работа-5-6)
  - [Инструкции по запуску проекта](#инструкции-по-запуску-проекта)
  - [Задания](#задания)
  - [Примеры использования](#примеры-использования)
  - [Список использованных источников](#список-использованных-источников)

## Инструкции по запуску проекта

1. Склонируйте репозиторий с проектом: git clone [https://github.com/S1ngle777/Lab_5_and_6_PHP.git](https://github.com/S1ngle777/Lab_5_and_6_PHP.git).
2. Запустите веб-сервер: php -S localhost:8080.
3. Откройте браузер и перейдите по адресу http://localhost:8080 для доступа к первому заданию.
4. Перейдите по адресу http://localhost:8080/task2.php для доступа ко второму заданию.
5. Перейдите по адресу http://localhost:8080/task3.php для доступа к третьему заданию.
6. Перейдите по адресу http://localhost:8080/task4a.php для доступа к четвёртому заданию.

## Задания

**1. Запись и чтение из файла**

1. Проанализируйте следующий скрипт

```php
<?php
//создание файла
$file = fopen("file.txt", "w") or die("Ошибка создания файла!");
//Вводим данные в файл
fwrite($file, "1. William Smith, 1990, 2344455666677\n");
fwrite($file, "2. John Doe, 1988, 4445556666787\n");
fwrite($file, "3. Michael Brown, 1991, 7748956996777\n");
fwrite($file, "4. David Johnson, 1987, 5556667779999\n");
fwrite($file, "5. Robert Jones, 1992, 99933456678888\n");
//Закрываем файл
fclose($file);
//Открываем файл для добавления данных
$file = fopen("file.txt", "a") or die("Ошибка открытия для добавления
данных!");
if (!$file) {
 echo("Не был найден файл для добавления данных!");
} else {
 // Добавьте в файл с помощью функции fwrite() еще 3 записи
}
fclose($file);
//Открываем файл для чтения из него
$file = fopen("file.txt", "r") or die("Ошибка открытия файла для чтения!");
if (!$file) {
 echo("Не был найден файл для чтения данных!");
} else { ?>
 <div>Данные из файла: </div>
 <?php
 while (!feof($file)) {
 echo fgets($file); ?>
 <br/>
 <?php
 }
 fclose($file);
}
```

2. Объясните, зачем необходимо закрывать файл fclose()

3. Добавьте в файл с помощью функции fwrite() ещё 3 записи

**2. Запись в файл с помощью функции file_get_contents()**

1. В задании №1 замените функцию fwrite на file_put_contents()

2. Чем отличается функция fwrite и file_put_contents?

**3. Обработка форм и файлов**

1. Проанализируйте следующий скрипт

```php
<?php if (!isset($_REQUEST['start'])) { ?>
<form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="post">
 <div>
 <label>Ваше имя: <input name="name" type="text" size="30"></label>
 </div>
 <div>
 <label>Ваше мнение о нас напишите тут:
 <textarea name="message" cols="40" rows="4" placeholder="Ваше
мнение..."></textarea>
 </label>
 </div>
 <div>
 <input type="reset" value="Стереть"/>
 <input type="submit" value="Передать" name="start"/>
 </div>
</form>
<?php } else {
 // Данные с формы
 $data = [
 'name' => $_POST['name'] ?? "",
 'message' => $_POST['message'] ?? "",
 ];
 // Сохранение данных в файл
 $file = fopen('messages.txt', 'a+') or die("Недоступный файл!");
 foreach ($data as $field => $value) {
 // Добавьте код для сохранения данных в файл
 }
 fwrite($file, "\n");
 fclose($file);
 // Вывод данных на экран
 echo 'Данные были сохранены! Вот что хранится в файле: <br />';
 $file = fopen("messages.txt", "r") or die("Недоступный файл!");
 while (!feof($file)) {
 echo fgets($file) . "<br />";
 }
 fclose($file);
}
```

2. Добавьте код, чтобы данные с формы сохранялись в файл
3. Добавьте еще 2 контроллера в форму и их верное сохранение в файл
   - Возраст (age), типа number.
   - E-mail, типа email

**4. Регистрация и авторизация пользователей**

1. Создайте HTML-форму регистрации с двумя полями: login (имя пользователя) и
   password (пароль).

2. Напишите PHP-скрипт, который обрабатывает данные, отправленные с формы.

3. Скрипт должен:

   - Проверить, что все поля заполнены.
   - Зашифровать пароль пользователя с помощью функции md5().
   - Сохранить данные пользователя в текстовый файл (например, users.txt) в формате: login:password.

4. При успешной регистрации отправьте пользователю HTTP-код 201 (Created).
   Объясните, для чего используются HTTP-коды.
5. Создайте HTML-форму авторизации с двумя полями: login (имя пользователя) и
   password (пароль).
6. Напишите PHP-скрипт, который обрабатывает данные, отправленные с формы.
7. Скрипт должен:
   - Проверить, что все поля заполнены.
   - Проверить, существует ли пользователь с таким логином и паролем в файле users.txt.
   - Если пользователь не найден, вывести сообщение об ошибке.
   - Если пользователь найден, перенаправить его на страницу с изображениями (например, images.php) с помощью функции header().

## Примеры использования

**1.1 Запись и чтение из файла**

Этот скрипт на языке PHP выполняет следующие действия:

Создание файла "file.txt".
Запись данных в файл.
Открытие файла для добавления данных.
Добавление еще 3 записей в файл.
Закрытие файла.
Открытие файла для чтения данных из него.
Вывод данных из файла на веб-страницу.
Закрытие файла после чтения.

**1.2 Запись и чтение из файла**

Освобождение ресурсов: Когда файл открыт с помощью fopen(), PHP выделяет ресурсы для работы с этим файлом. Закрыв файл с помощью fclose(), вы освобождаете эти ресурсы, что позволяет другим процессам или скриптам использовать файл.
Сохранение изменений: Некоторые операционные системы могут не сохранить изменения в файле, пока он не будет закрыт. Поэтому, чтобы убедиться, что все изменения записаны на диск, важно закрыть файл с помощью fclose() после выполнения операций записи.
Предотвращение ошибок: Закрыв файл после использования помогает избежать возможных ошибок или проблем с производительностью, связанных с незакрытыми файлами.

**1.3 Запись и чтение из файла Добавьте в файл с помощью функции fwrite() ещё 3 записи**

```php
// Открываем файл для добавления данных
$file = fopen("file.txt", "a") or die("Ошибка открытия для добавления данных!");
if (!$file) {
    echo("Не был найден файл для добавления данных!");
} else {
    // Добавляем в файл еще 3 записи
    fwrite($file, "6. Christopher Lee, 1995, 8887776665554\n");
    fwrite($file, "7. Emily White, 1998, 4443332221110\n");
    fwrite($file, "8. Jessica Green, 1993, 1112223334447\n");
}
fclose($file); // Закрываем файл после добавления данных
```

![1 1](https://github.com/Salam4ik666/lab5-6_php/assets/159524637/40b8f7d0-7f3d-4c1a-83d2-c8cef3afaff8)
![1 2](https://github.com/Salam4ik666/lab5-6_php/assets/159524637/cf7d2b0b-6c9a-430e-876a-35fb8afb4a63)

**2 Запись в файл с помощью функции file_get_contents()**

**2.1 В задании №1 замените функцию fwrite на file_put_contents()**

```php
<?php
// Создание файла и запись начальных данных
$fileContent = "1. William Smith, 1990, 2344455666677\n";
$fileContent .= "2. John Doe, 1988, 4445556666787\n";
$fileContent .= "3. Michael Brown, 1991, 7748956996777\n";
$fileContent .= "4. David Johnson, 1987, 5556667779999\n";
$fileContent .= "5. Robert Jones, 1992, 99933456678888\n";
file_put_contents("file.txt", $fileContent);

// Добавление еще 3 записей в файл
$additionalContent = "6. Christopher Lee, 1995, 8887776665554\n";
$additionalContent .= "7. Emily White, 1998, 4443332221110\n";
$additionalContent .= "8. Jessica Green, 1993, 1112223334447\n";
file_put_contents("file.txt", $additionalContent, FILE_APPEND);

// Открытие файла для чтения и вывод данных
$fileData = file_get_contents("file.txt");
if ($fileData === false) {
    echo ("Ошибка чтения данных из файла!");
} else {
    echo "<div>Данные из файла:</div>";
    echo nl2br($fileData);
}
```

**2.2 Чем отличается функция fwrite и file_put_contents?**

Интерфейс и использование:

fwrite() требует явного открытия файла с помощью fopen(), записи в файл с помощью fwrite() и затем закрытия файла с помощью fclose().
file_put_contents() является более простой и удобной альтернативой. Она позволяет записывать данные в файл в одной строке без явного открытия и закрытия файла.
Обработка ошибок:

При использовании fwrite(), вы должны явно обрабатывать ошибки при открытии файла и записи данных.
file_put_contents() автоматически обрабатывает ошибки открытия файла и записи данных, поэтому вам не нужно явно проверять возвращаемое значение.
Режимы записи:

fwrite() позволяет контролировать режимы записи (например, "w" для записи с начала файла или "a" для добавления в конец файла).
file_put_contents() также позволяет указать режим записи с помощью параметра flags, но он менее гибок, чем при использовании fwrite() в сочетании с fopen().
В целом, file_put_contents() обеспечивает более простой и удобный способ записи данных в файл по сравнению с fwrite(), особенно если вам не требуется сложная обработка ошибок или управление режимами записи.

**3 3. Обработка форм и файлов**
**3.1. Проанализируйте следующий скрипт**

```php
<?php if (!isset($_REQUEST['start'])) { ?>
<form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="post">
 <div>
 <label>Ваше имя: <input name="name" type="text" size="30"></label>
 </div>
 <div>
 <label>Ваше мнение о нас напишите тут:
 <textarea name="message" cols="40" rows="4" placeholder="Ваше
мнение..."></textarea>
 </label>
 </div>
 <div>
 <input type="reset" value="Стереть"/>
 <input type="submit" value="Передать" name="start"/>
 </div>
</form>
<?php } else {
 // Данные с формы
 $data = [
 'name' => $_POST['name'] ?? "",
 'message' => $_POST['message'] ?? "",
 ];
 // Сохранение данных в файл
 $file = fopen('messages.txt', 'a+') or die("Недоступный файл!");
 foreach ($data as $field => $value) {
 // Добавьте код для сохранения данных в файл
 }
 fwrite($file, "\n");
 fclose($file);
 // Вывод данных на экран
 echo 'Данные были сохранены! Вот что хранится в файле: <br />';
 $file = fopen("messages.txt", "r") or die("Недоступный файл!");
 while (!feof($file)) {
 echo fgets($file) . "<br />";
 }
 fclose($file);
}
```

он выводит форму для ввода данных, сохраняет введенные данные в файл "messages.txt" и выводит содержимое этого файла на экран.

**3.2. Добавьте код, чтобы данные с формы сохранялись в файл**

<?php if (!isset($_REQUEST['start'])) { ?>

    <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="post">
        <div>
            <label>Ваше имя: <input name="name" type="text" size="30"></label>
        </div>
        <div>
            <label>Ваше мнение о нас напишите тут:
                <textarea name="message" cols="40" rows="4" placeholder="Ваше мнение..."></textarea>
            </label>
        </div>
        <div>
            <input type="reset" value="Стереть" />
            <input type="submit" value="Передать" name="start" />
        </div>
    </form>

<?php } else {
    // Данные с формы
    $data = [
        'name' => $_POST['name'] ?? "",
        'message' => $_POST['message'] ?? "",
    ];
    // Сохранение данных в файл
    $file = fopen('messages.txt', 'a+') or die("Недоступный файл!");
    foreach ($data as $field => $value) {
        fwrite($file, "$field: $value\n");
    }
    fwrite($file, "\n"); // Добавляем пустую строку для разделения записей
    fclose($file);
    // Вывод данных на экран
    echo 'Данные были сохранены! Вот что хранится в файле: <br />';
    $file = fopen("messages.txt", "r") or die("Недоступный файл!");
    while (!feof($file)) {
        echo fgets($file) . "<br />";
    }
    fclose($file);
}
?>

![image](https://github.com/Salam4ik666/lab5-6_php/assets/159524637/bc05459b-1515-4f3d-8747-4bcec0f40bf2)

**3.3. Добавьте еще 2 контроллера в форму и их верное сохранение в файл**

<?php if (!isset($_REQUEST['start'])) { ?>

    <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="post">
        <div>
            <label>Ваше имя: <input name="name" type="text" size="30"></label>
        </div>
        <div>
            <label>Ваше мнение о нас напишите тут:
                <textarea name="message" cols="40" rows="4" placeholder="Ваше мнение..."></textarea>
            </label>
        </div>
        <div>
            <label>Возраст: <input name="age" type="number" size="10"></label>
        </div>
        <div>
            <label>E-mail: <input name="email" type="email" size="30"></label>
        </div>
        <div>
            <input type="reset" value="Стереть" />
            <input type="submit" value="Передать" name="start" />
        </div>
    </form>

<?php } else {
    // Данные с формы
    $data = [
        'name' => $_POST['name'] ?? "",
        'message' => $_POST['message'] ?? "",
        'age' => $_POST['age'] ?? "",
        'email' => $_POST['email'] ?? "",
    ];
    // Сохранение данных в файл
    $file = fopen('messages.txt', 'a+') or die("Недоступный файл!");
    foreach ($data as $field => $value) {
        fwrite($file, "$field: $value\n");
    }
    fwrite($file, "\n"); // Добавляем пустую строку для разделения записей
    fclose($file);
    // Вывод данных на экран
    echo 'Данные были сохранены! Вот что хранится в файле: <br />';
    $file = fopen("messages.txt", "r") or die("Недоступный файл!");
    while (!feof($file)) {
        echo fgets($file) . "<br />";
    }
    fclose($file);
}
?>

![image](https://github.com/Salam4ik666/lab5-6_php/assets/159524637/8aadd8fb-9ed4-4001-ab92-b24014bbfeaf)
![image](https://github.com/Salam4ik666/lab5-6_php/assets/159524637/d9b6868d-f886-4677-9a1d-6e713da6127a)

\_\_4. Регистрация и авторизация пользователей

4.1. Создайте HTML-форму регистрации с двумя полями: login (имя пользователя) и
password (пароль).
![image](https://github.com/Salam4ik666/lab5-6_php/assets/159524637/1382d00d-5c84-4c2a-90ba-b777b1b37e38)

![image](https://github.com/Salam4ik666/lab5-6_php/assets/159524637/288c1e2c-dc32-4b1c-803b-b3a03c981f47)

4.2. Напишите PHP-скрипт, который обрабатывает данные, отправленные с формы.

4.3. Скрипт должен:
 Проверить, что все поля заполнены.
 Зашифровать пароль пользователя с помощью функции md5().
 Сохранить данные пользователя в текстовый файл (например, users.txt) в
формате: login:password.
4.4. При успешной регистрации отправьте пользователю HTTP-код 201 (Created).
Объясните, для чего используются HTTP-коды.
![image](https://github.com/Salam4ik666/lab5-6_php/assets/159524637/85d66482-2ddd-42ce-a55b-ed97a36a7686)
![image](https://github.com/Salam4ik666/lab5-6_php/assets/159524637/083a1f67-5586-4743-9e6b-b7d1b0e17bbb)
![image](https://github.com/Salam4ik666/lab5-6_php/assets/159524637/d47e0f26-e99d-4aed-aeb0-d5476bfdd8b5)
![image](https://github.com/Salam4ik666/lab5-6_php/assets/159524637/6beaf866-0146-4ac8-be8f-fa2af01ca5a7)
![image](https://github.com/Salam4ik666/lab5-6_php/assets/159524637/0581a08b-70e3-4a85-ae51-36bc9636bc48)

4.4. Создайте HTML-форму авторизации с двумя полями: login (имя пользователя) и
password (пароль).
4.5. Напишите PHP-скрипт, который обрабатывает данные, отправленные с формы.
4.6. Скрипт должен:
 Проверить, что все поля заполнены.
 Проверить, существует ли пользователь с таким логином и паролем в файле
users.txt.
 Если пользователь не найден, вывести сообщение об ошибке.
 Если пользователь найден, перенаправить его на страницу с изображениями
(например, images.php) с помощью функции header().
Внизу будут показаны некоторые исходники (примеры) для создания скрипта
регистрации и авторизации. Вы можете написать свои скрипты.\_\_

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

![image](https://github.com/Salam4ik666/lab5-6_php/assets/159524637/098e4001-c55e-4f27-86c2-861091df26f7)
![image](https://github.com/Salam4ik666/lab5-6_php/assets/159524637/630289e7-c6e0-4bfe-9da7-de22af62643f)
![image](https://github.com/Salam4ik666/lab5-6_php/assets/159524637/26625171-779d-4cac-ac71-f5b13a7a7741)
