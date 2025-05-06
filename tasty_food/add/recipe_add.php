<?php
session_start();
include "../include/connect.php";
if (empty($_SESSION['user']['name'])){
  header("Location: ../auth.php");}
$new = mysqli_query($connection, "SELECT * FROM `recipe` WHERE 1");
?>

 


<!DOCTYPE html>
<html lang="ru">
<head>
    <link rel="stylesheet" href="../css/auth.css" />
    <link rel="stylesheet" href="../css/profile.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация и регистрация</title>
    
</head>
<body>
<!-- форма авторизации -->
<div class="header">
  <div class="container">
    <div class="header-line">
      <div class="nav">
        <a class="nav-item" href="../index.php">ГЛАВНАЯ</a>
        <a class="nav-item" href="../profile.php">ПРОФИЛЬ</a>
        
      </div>
      <div class="menu">
        <button id="button-menu">
          <img src="/image/Group.png" alt="" />
        </button>
        <div id="slide-menu" class="slide disp">
          <a class="nav-item block" href="../index.php">ГЛАВНАЯ</a>
          <a class="nav-item" href="../profile.php">ПРОФИЛЬ</a>
        </div>
      </div>
    </div>
      <br><br><br><br>


<form action="create.php" method="post" enctype="multipart/form-data">
    <div id="profile">
        <p>Название блюда</p>
        <input style="width: 300px;" type="text" name="title">
        <p>Фото готового блюда</p>
        <input type="file" name="filename">

        <div id="ingredients-list">
            <p>Ингредиенты</p>
            <div class="ingredient">
                <input type="text" name="ingredients[]" placeholder="Название">
                <input type="text" name="amount[]" placeholder="Количество">
            </div>
        </div>
        
        <button type="button" onclick="addIngredient()">Добавить ингредиент</button>
    </div>

    <div id="instructions-list">
            <p>Инструкция приготовления</p>
            <div class="instruction-step">
                <input type="text" name="instructions[]" placeholder="Шаг 1">
            </div>
        </div>
        <button type="button" onclick="addInstruction()">Добавить шаг</button>
    </div>
    <p>Время готовки в минутах</p>
    <input type="text" name="time">
    <input type="submit" value="Добавить">
</form>

<script>
    function addIngredient() {
        let div = document.createElement("div");
        div.className = "ingredient";
        div.innerHTML = `
            <input type="text" name="ingredients[]" placeholder="Название">
            <input type="text" name="amount[]" placeholder="Количество">
            <button type="button" onclick="this.parentNode.remove()">Удалить</button>
        `;
        document.getElementById("ingredients-list").appendChild(div);
    }

    function addInstruction() {
        let div = document.createElement("div");
        div.className = "instruction-step";
        let stepCount = document.querySelectorAll(".instruction-step").length + 1;
        div.innerHTML = `
            <input type="text" name="instructions[]" placeholder="Шаг ${stepCount}">
            <button type="button" onclick="this.parentNode.remove()">Удалить</button>
        `;
        document.getElementById("instructions-list").appendChild(div);
    }
</script>

 
</div>
</div>

 
 



<script src="/script/script.js">




</script>
</body>
</html>