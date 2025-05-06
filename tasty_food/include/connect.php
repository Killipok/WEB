<?php

$connection = mysqli_connect("127.0.0.1", "root", "", "tasty-food");

if($connection == false ) {
    echo 'не удалось подключиться';
    echo mysqli_connect_error();
    exit();
}

?>










