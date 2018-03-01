<?php

$output = shell_exec('ps -C php -f');

if (strpos($output, "php index.php") === false) {
    shell_exec('php index.php  > /dev/null 2>&1 &');
}