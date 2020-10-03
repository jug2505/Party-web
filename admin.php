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
    <label>Заголовок новости</label>
    <input type="text" name="news_title" placeholder="Введите заголовок новости">
    <label>Изображение новости</label>
    <input type="file" name="picture">
    <label>Новость</label>
    <textarea type="text" name="news_text" placeholder="Введите текст новости" style="height: 300px"></textarea>
    <button type="submit">Отправить</button>
    <a href="database/logout.php" class="btn btn-secondary my-2">Выход</a>
  </form>

</body>
</html>