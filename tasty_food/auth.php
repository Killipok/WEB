<?php 
session_start();

    if(isset($_SESSION['user'])){
        header("Location: profile.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/pog.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация и регистрация</title>
    
</head>
<body>

<div class="header">
  <div class="container">
    <div class="header-line">
      <div class="nav">
        <a class="nav-item" href="index.php">ГЛАВНАЯ</a>
        
      </div>
      <div class="menu">
        <button id="button-menu">
          <img src="/image/Group.png" alt="" />
        </button>
        <div id="slide-menu" class="slide disp">
          <a class="nav-item block" href="index.php">ГЛАВНАЯ</a>
        </div>
      </div>
    </div>
    <form action="include/signin.php" method="post">
        <input type="text" name="login" placeholder="Логин">
        <input type="password" name="password" placeholder="Пароль">
        <button type="submit">Войти</button>
        <p>У вас нет аккаунта? <a href="/register.php">Регистрация</a> 

        </p>
    </form>
  </div>
</div>

<!-- форма авторизации -->




    <script src="/script/script.js"></script>
</body>
</html>