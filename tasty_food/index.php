<?php
session_start();
if (empty($_SESSION['user']['name'])){
  $vivod = "Профиль";}
  else {
      $vivod = $_SESSION['user']['name'];
  }
  
  if ($_SESSION['user']['login'] === 'admin' || $_SESSION['user']['name'] === 'admin') {
    header("Location: admin.php");
    exit();
}
  
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
  <link rel="manifest" href="/favicon/site.webmanifest">
  <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
  <link rel="stylesheet" href="css/style.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet" />
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TastyFood</title>
</head>

<body>
  <div class="header">
    <div class="container">
      <div class="header-line">
        <div class="header-logo">
          <img class="logo-png" src="image/logo.png" alt="" />
        </div>

        <div class="nav">
          <a class="nav-item" href="index.php">ГЛАВНАЯ</a>
          <a class="nav-item" href="/add/recipe_add.php">ДОБАВИТЬ РЕЦЕПТ</a>
        </div>
        <div class="btn">
          <a class="button" href="auth.php"><?= $vivod ?></a>
           
        </div>

        <div class="menu">
          <button id="button-menu">
            <img src="/image/Group.png" alt="" />
          </button>
          <div id="slide-menu" class="slide disp">
            <a class="nav-item block" href="index.php">ГЛАВНАЯ</a>
            <a class="nav-item block" href="/add/recipe_add.php">ДОБАВИТЬ РЕЦЕПТ</a>
            <a class="nav-item block" href="auth.php">ПРОФИЛЬ</a>
          </div>
        </div>
      </div>
      <div class="header-down">
        <div class="header-title">
          Добро пожаловать
          <div class="header-suptitle">ВКУСНЫЕ РЕЦЕПТЫ</div>

          <div class="header-btn">
            <a href="#recipes" class="header-button">РЕЦЕПТЫ</a>
          </div>
        </div>
      </div>
    </div>
  </div>




  <div class="container-block">

  <?php
    include "include/connect.php";
    $new = mysqli_query($connection, "SELECT * FROM `recipe` WHERE 1 ORDER BY `recipe`.`id` DESC");
    while($music_new = mysqli_fetch_assoc($new)){
?>


  <div id="recipes" class="item">
    <div class="item-img">
    <a href="american-pancakes.php/?id=<?php echo $music_new["id"] ?>">
      <img class="img-img" alt="avatar" src="../recipe_img/<?php echo $music_new['filename'];?>"/> </a>
    </div>
      <div class="item-title">
      <p><?php echo $music_new['title'];?></p>
      </div>
      <div class="item-time">
      <p>Время готовки:</p>
      <p class="txt" ><?php echo $music_new['time'];?>m</p>
      </div>
  </div>
  <?php
         }
?>
</div>

  <script src="/script/script.js"></script>
</body>

</html>