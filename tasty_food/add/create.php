<?php
session_start();
require_once "../include/connect.php";

// Получаем данные из формы
$title = mysqli_real_escape_string($connection, $_POST['title']);
$time = (int)$_POST['time'];

$ingredients = $_POST['ingredients'] ?? []; // массив названий ингредиентов
$amounts = $_POST['amount'] ?? []; // массив количеств
$instructions = $_POST['instructions'] ?? []; // массив шагов инструкции

// Проверяем загрузку изображения
if (!empty($_FILES['filename']['name'])) {
    $filename = $_FILES['filename']['name'];
    move_uploaded_file($_FILES['filename']['tmp_name'], '../recipe_img/' . $filename);
} else {
    $filename = "default.jpg"; // Изображение по умолчанию
}

// Вставка рецепта в БД
$sqlRecipe = "INSERT INTO `recipe` (`title`, `filename`, `time`) VALUES ('$title', '$filename', '$time')";
if (!mysqli_query($connection, $sqlRecipe)) {
    die("Ошибка при добавлении рецепта: " . mysqli_error($connection));
}

$recipeId = mysqli_insert_id($connection); // Получаем ID нового блюда

// Вставка ингредиентов
if (!empty($ingredients) && !empty($amounts)) {
    for ($i = 0; $i < count($ingredients); $i++) {
        $ingredientName = mysqli_real_escape_string($connection, $ingredients[$i]);
        $ingredientAmount = mysqli_real_escape_string($connection, $amounts[$i]);

        $sqlIngredient = "INSERT INTO `ingredients` (`recipe_id`, `name`, `amount`) 
                          VALUES ('$recipeId', '$ingredientName', '$ingredientAmount')";
        
        if (!mysqli_query($connection, $sqlIngredient)) {
            die("Ошибка при добавлении ингредиента: " . mysqli_error($connection));
        }
    }
}

// Вставка инструкции
if (!empty($instructions)) {
    foreach ($instructions as $step) {
        $step = mysqli_real_escape_string($connection, $step);
        mysqli_query($connection, "INSERT INTO `Instructions` (`recipe_id`, `instruction`) VALUES ('$recipeId', '$step')");
    }
}

mysqli_close($connection);

// Перенаправление на профиль
header("Location: ../profile.php");
?>
