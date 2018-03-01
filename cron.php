<?php

$output = shell_exec('ps -C php -f');

if (strpos($output, "php index.php") === false) {
    echo 'запускаем файл';
    shell_exec('php index.php  > /dev/null 2>&1 &');
} else {
    echo 'файл все еще запущен ... ';
}