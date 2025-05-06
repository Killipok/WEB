<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/proff.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet" />
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Профиль</title>
</head>



<div class="header">
  <div class="container">
    <div class="header-line">
      <div class="nav">
        <a class="nav-item" href="index.php">ГЛАВНАЯ</a>
        <a class="nav-exit" href="/include/logout.php">ВЫХОД</a>
      </div>
      <div class="menu">
          <button id="button-menu">
            <img src="/image/Group.png" alt="" />
          </button>
          <div id="slide-menu" class="slide disp">
            <a class="nav-item block" href="index.php">ГЛАВНАЯ</a>
            <a class="nav-item block" href="add/recipe_add.php">Добавить рецепт</a> 
            <a class="nav-exit" href="/include/logout.php">ВЫХОД</a>
          </div>
        </div>
      </div>

        </div>
      </div>
    </div>
  </div>
</div>


<div class="profile">
  <div class="container" id="profile">
    <div class="col">
      <div class="row">
        <form class="p-3 border bg-light" action="edit.php?id=<?= $_SESSION['user']['id'] ?>" method="POST" enctype="multipart/form-data">
          <img src="<?= $_SESSION['user']['avatar'] ?>" class="rounded float-start" style="margin-right: 70px" width="200px" alt="avatar">
          <div style="color: black; font-weight: bold; font-size: 40px;"><?= $_SESSION['user']['name'] ?> </div>
          <a class="add_recipe" href="add/recipe_add.php">Добавить рецепт</a> |
          <a class="saved" href="#">Избранное</a>
        </form>
      </div>
    </div>
  </div>
</div>





<script src="/script/script.js"></script>

</body>

</html>