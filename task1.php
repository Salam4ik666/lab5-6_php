<?php
// Создаем файл и записываем исходные данные
$file = fopen("file.txt", "w") or die("Ошибка создания файла!");
fwrite($file, "1. William Smith, 1990, 2344455666677\n");
fwrite($file, "2. John Doe, 1988, 4445556666787\n");
fwrite($file, "3. Michael Brown, 1991, 7748956996777\n");
fwrite($file, "4. David Johnson, 1987, 5556667779999\n");
fwrite($file, "5. Robert Jones, 1992, 99933456678888\n");
fclose($file);

// Открываем файл для добавления данных
$file = fopen("file.txt", "a") or die("Ошибка открытия для добавления данных!");
if (!$file) {
    echo ("Не был найден файл для добавления данных!");
} else {
    // Добавляем еще 3 записи в файл
    fwrite($file, "6. Christopher Lee, 1995, 8887776665554\n");
    fwrite($file, "7. Emily White, 1998, 4443332221110\n");
    fwrite($file, "8. Jessica Green, 1993, 1112223334447\n");
}
fclose($file); // Закрываем файл после добавления данных

// Открываем файл для чтения из него и выводим данные
$file = fopen("file.txt", "r") or die("Ошибка открытия файла для чтения!");
if (!$file) {
    echo ("Не был найден файл для чтения данных!");
} else { ?>
    <div>Данные из файла: </div>
    <?php
    while (!feof($file)) {
        echo fgets($file); ?>
        <br />
<?php
    }
    fclose($file);
}
?>