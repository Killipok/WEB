<?php

$connect = mysqli_connect ('localhost', 'root','','login');

if (!$connect) {
    die('Error connect');
}