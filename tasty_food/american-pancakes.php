<?php
include "include/connect.php";

$id = (int)$_GET["id"]; // Приводим к числу для безопасности

// Получаем данные рецепта
$recipe_query = mysqli_query($connection, "SELECT * FROM `recipe` WHERE `id` = $id");
$recipe = mysqli_fetch_assoc($recipe_query);

// Получаем ингредиенты рецепта
$ingredients_query = mysqli_query($connection, "SELECT * FROM `ingredients` WHERE `recipe_id` = $id");

// Получаем инструкцию приготовления
$instructions_query = mysqli_query($connection, "SELECT instruction FROM `Instructions` WHERE `recipe_id` = $id");
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <link rel="stylesheet" href="/css/recipes.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo htmlspecialchars($recipe['title']); ?></title>
</head>
<body>

<div class="header">
    <div class="container">
        <div class="header-line">
            <div class="nav">
                <a class="nav-item" href="../index.php">ГЛАВНАЯ</a>
            </div>
            <div class="menu">
                <button id="button-menu">
                    <img src="/image/Group.png" alt="" />
                </button>
                <div id="slide-menu" class="slide disp">
                    <a class="nav-item block" href="../index.php">ГЛАВНАЯ</a>
                    <a class="nav-item block" href="../auth.php">Вход</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="recipe-information">
    <div class="container">
        <div class="recipe-info">
            <div class="recipe-title"><?php echo htmlspecialchars($recipe['title']); ?></div>
            <p class="time">Время готовки: <?php echo (int)$recipe['time']; ?> минут</p>

            <div class="info-image">
                <img class="info-img" src="../recipe_img/<?php echo htmlspecialchars($recipe['filename']); ?>" alt="<?php echo htmlspecialchars($recipe['title']); ?>"/>
            </div>

            <div class="ingredients">
                <div class="ingredients-title">ИНГРЕДИЕНТЫ</div>
                <?php while ($ingredient = mysqli_fetch_assoc($ingredients_query)) { ?>
                    <div class="ingredient-item">
                    <div class="emotion-7yevpr">
              <div class="emotion-ydhjlb">
                <div class="emotion-bjn8wh">
                  <span title="" class="emotion-mdupit"
                    ><span itemprop="recipeIngredient"
                      ><?php echo htmlspecialchars($ingredient['name']); ?>
                    </span></span
                  >
                </div>
                <span class="emotion-1f5cedg"></span
                ><span title="" class="emotion-bsdd3p"><?php echo htmlspecialchars($ingredient['amount']); ?></span>
              </div>
            </div>
                    </div>
                <?php } ?>
            </div>

            <div class="manual">
                <div class="cooking-instructions">ИНСТРУКЦИЯ ПРИГОТОВЛЕНИЯ</div>
                <div class="instruction-text">
                    <?php 
                    $step_number = 1;
                    while ($instruction = mysqli_fetch_assoc($instructions_query)) { 
                        echo "<p><strong>Шаг $step_number:</strong> " . nl2br(htmlspecialchars($instruction['instruction'])) . "</p>";
                        $step_number++;
                    } 
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/script/script.js"></script>
</body>
</html>
