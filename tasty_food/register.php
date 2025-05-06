<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/auth.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация и регистрация</title>
    
</head>
<body>
<!-- форма регистрации -->

    <form action="include/signup.php" method="post" enctype="multipart/form-data">
        <input type="text" name="login" placeholder="Логин">
        <input type="text" name="name" placeholder="Имя">
        <input type="file" name="avatar" >
        <input type="password" name="password" placeholder="Пароль">
        <button type="submit" >Зарегистрироваться</button>
        <p>Уже есть аккаунт? <a href="/auth.php">Войти</a> 

        </p>
    </form>
</body>
</html>