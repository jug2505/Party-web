<?php
session_start();

if (!isset($_SESSION['user'])) {
  header('Location: /');
}

if ($_SESSION['user']['full_name'] !== 'admin' && $_SESSION['user']['email'] !== 'admin@admin'){
  header('Location: /');
}

?>

<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Админ</title>
  <link rel="stylesheet" href="style/profile.css">
</head>
<body>

<!-- Форма администрирования -->
  <form action="database/newsupld.php" method="post" enctype="multipart/form-data">
    <label>Заголовок новости <a href="news.php" class="stretched-link">(Посмотреть все новости)</a></label>
    <input type="text" name="news_title" placeholder="Введите заголовок новости">
    <label>ID города</label>
    <input type="text" name="town_id" placeholder="Введите ID города">
    <label>ID жанра</label>
    <input type="text" name="genre_id" placeholder="Введите ID жанра">
    <label>Изображение новости</label>
    <input type="file" name="picture">
    <label>ID автора новости <a href="authors.php" class="stretched-link">(Посмотреть всех авторов)</a></label>
    <input type="text" name="author" placeholder="Введите ID автора новости">
    <label>Новость</label>
    <textarea type="text" name="news_text" placeholder="Введите текст новости" style="height: 200px"></textarea>
    <button type="submit">Отправить</button>
    <a style="margin: 10px; text-align: center;" href="adminFeatures.php">Дополнительные функции администрирования</a>
    <a style="margin: 10px; text-align: center;" href="database/logout.php">Выход</a>    
    <?php
      if (isset($_SESSION['message'])) {
        echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
      }
      unset($_SESSION['message']);
    ?>
  </form>
  

</body>
</html>