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
