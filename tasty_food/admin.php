<?php
session_start();

if ($_SESSION['user']['login'] !== 'admin' || $_SESSION['user']['name'] !== 'admin') {
    header("Location: index.php");
    exit();
}

require_once "include/connect.php";

// Удаление рецепта
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    mysqli_autocommit($connection, true);
    mysqli_query($connection, "DELETE FROM `ingredients` WHERE `recipe_id` = $id");
    mysqli_query($connection, "DELETE FROM `Instructions` WHERE `recipe_id` = $id");
    mysqli_query($connection, "DELETE FROM `recipe` WHERE `id` = $id");
    header("Location: admin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <link rel="stylesheet" href="css/style.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ-панель</title>
</head>
<body>

<div class="header">
    <div class="container">
        <div class="header-line">
            <div class="nav">
                <a class="nav-item" href="index.php">ГЛАВНАЯ</a>
                <a class="nav-item" href="/add/recipe_add.php">ДОБАВИТЬ РЕЦЕПТ</a>
            </div>
            <div class="btn">
                <a class="button" href="auth.php">admin</a>
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
    $recipes = mysqli_query($connection, "SELECT * FROM `recipe` ORDER BY `id` DESC");
    while ($recipe = mysqli_fetch_assoc($recipes)) {
        ?>
        <div id="recipes" class="item">
            <div class="item-img">
                <a href="view.php?id=<?php echo $recipe["id"]; ?>">
                    <img class="img-img" alt="recipe" src="recipe_img/<?php echo htmlspecialchars($recipe['filename']); ?>"/>
                </a>
            </div>
            <div class="item-title">
                <p><?php echo htmlspecialchars($recipe['title']); ?></p>
            </div>
            <div class="item-time">
                <p>Время готовки:</p>
                <p class="txt"><?php echo (int)$recipe['time']; ?>m</p>
            </div>
            <div class="admin-controls">
                <a href="?delete=<?php echo $recipe['id']; ?>" class="delete-btn" onclick="return confirm('Удалить рецепт?');">Удалить</a>
            </div>
        </div>
        <?php
    }
    ?>
</div>

<script src="/script/script.js"></script>
</body>
</html>
