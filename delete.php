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

<!-- Форма Удаления -->
  <form action="database/newsdelete.php" method="post" enctype="multipart/form-data">
    <label>ID удаляемой новости</label>
    <a href="news.php" class="stretched-link">(Посмотреть все новости)</a>
    <input type="number" name="news_id" placeholder="Введите ID новости">
    <button type="submit">Отправить</button>
    <?php
      if (isset($_SESSION['message'])) {
        echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
      }
      unset($_SESSION['message']);
    ?>
  </form>

  <form action="database/authordelete.php" method="post" enctype="multipart/form-data" style="margin-left: 25px;">
    <label>ID удаляемого автора</label>
    <a href="authors.php" class="stretched-link">(Посмотреть всех авторов)</a>
    <input type="number" name="author_id" placeholder="Введите ID автора">
    <button type="submit">Отправить</button>
  </form>

  
  <form action="database/deleteGenre.php" method="post" enctype="multipart/form-data" style="margin-left: 25px;">
    <label>ID удаляемого жанра</label>
    <input type="number" name="genre_id" placeholder="Введите ID">
    <button type="submit">Отправить</button>
  </form>

  <form action="database/deleteTown.php" method="post" enctype="multipart/form-data" style="margin-left: 25px;">
    <label>ID удаляемого города</label>
    <input type="number" name="town_id" placeholder="Введите ID">
    <button type="submit">Отправить</button>
  </form>

  <form action="database/deleteDep.php" method="post" enctype="multipart/form-data" style="margin-left: 25px;">
    <label>ID удаляемого отделения</label>
    <input type="number" name="dep_id" placeholder="Введите ID">
    <button type="submit">Отправить</button>
  </form>

  <form action="database/deleteEvent.php" method="post" enctype="multipart/form-data" style="margin-left: 25px;">
    <label>ID удаляемого события</label>
    <input type="number" name="event_id" placeholder="Введите ID">
    <button type="submit">Отправить</button>
  </form>

  

</body>
</html>