<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>auth</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    
<form  action="vendor/signup.php" method="post" enctype="multipart/form-data">
    <label>Фио</label>
    <input type="text" name="full_name" placeholder="Введите ФИО">
    <label>Логин</label>
    <input type="text" name="login" placeholder="Введите Логин">
    <label>Почта</label>
    <input type="email" name="email" placeholder="Введите почту">
    <label>Изображение профиля</label>
    <input type="file" name="avatar" >
    <label>Пароль</label>
    <input type="password" name="password" placeholder="Введите пароль">
    <label>Подтвердите пароль</label>
    <input type="password" name="password_confirm" placeholder="Подтвердите пароль">
    <button type="submit" >Войти</button>
    
    <p>
        У вас уже есть аккаунт - <a href="index.php">авторицируйтесь</a>

    </p>
    <?php   
                if($_SESSION['message']){
                    echo '<p class="msg"> '. $_SESSION['message'] .' </p>';

                }
            unset($_SESSION['message']);
    ?>
</form>


</body>
</html>