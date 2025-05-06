<?php
session_start();
require_once 'connect.php';
 
$name = $_POST['name'];
$login = $_POST['login'];
$password = $_POST['password'];
$path = 'uploads/' . time() . $_FILES['avatar']['name'];
move_uploaded_file($_FILES['avatar'] ['tmp_name'], '../' . $path);

$password = md5($password);

mysqli_query($connection, "INSERT INTO `users` (`id`, `name`, `login`, `password`, `avatar`) VALUES (NULL, '$name', '$login', '$password', '$path')");

header('location: ../auth.php');