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
  <title>Редактирование новости</title>
  <link rel="stylesheet" href="style/profile.css">
</head>
<body>

<!-- Форма администрирования -->
  <form action="database/newsUpdate.php" method="post" enctype="multipart/form-data">
    <label>ID новости <a href="news.php" class="stretched-link">(Посмотреть все новости)</a></label>
    <input type="text" name="news_id" placeholder="Введите заголовок новости">
    <label>Заголовок новости</label>
    <input type="text" name="news_title" placeholder="Введите заголовок новости">
    <label>Изображение новости</label>
    <input type="file" name="picture">
    <label>ID автора новости <a href="authors.php" class="stretched-link">(Посмотреть всех авторов)</a></label>
    <input type="text" name="author" placeholder="Введите ID автора новости">
    <label>Новость</label>
    <textarea type="text" name="news_text" placeholder="Введите текст новости" style="height: 300px"></textarea>
    <button type="submit">Отправить</button>
    <?php
      if (isset($_SESSION['message'])) {
        echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
      }
      unset($_SESSION['message']);
    ?>
  </form>

</body>
</html>