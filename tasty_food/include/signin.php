<?php
require_once("connect.php");
session_start();

$login = $_POST["login"];
$password = md5($_POST["password"]);

if ($login === 'admin' && $_POST["password"] === 'admin') {
    $_SESSION['user'] = [
        "id" => 0,
        "name" => "admin",
        "login" => "admin",
    ];
    header("Location: ../admin.php");
    exit();
}

$check_user = mysqli_query($connection, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
if (mysqli_num_rows($check_user) > 0) {
    $user = mysqli_fetch_assoc($check_user);
    $_SESSION['user'] = [
        "id" => $user['id'],
        "name" => $user['name'],
        "login" => $user['login'],
        "avatar" => $user['avatar'],
    ];
    header("Location: ../profile.php");
} else {
    $_SESSION["msg"] = "Пользователь не найден";
    header("Location: ../auth.php");
}
?>
