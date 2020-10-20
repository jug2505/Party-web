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
    <a style="margin: 10px; text-align: center;" href="delete.php">Перейти на форму удаления</a>
    <a style="margin: 10px; text-align: center;" href="updateNews.php">Перейти на форму редактирования новости</a>
    <a style="margin: 10px; text-align: center;" href="updateAuthor.php">Перейти на форму редактирования автора</a>
    <a style="margin: 10px; text-align: center;" href="addAuthor.php">Перейти на форму добавления журналиста</a>
    <a style="margin: 10px; text-align: center;" href="addTown.php">Перейти на форму добавления города</a>
    <a style="margin: 10px; text-align: center;" href="addGenre.php">Перейти на форму добавления жанра</a>
    <a style="margin: 10px; text-align: center;" href="addDep.php">Перейти на форму добавления региональных отделений</a>
    <a style="margin: 10px; text-align: center;" href="addEvent.php">Перейти на форму добавления события</a>
    <a style="margin: 10px; text-align: center;" href="showLogs.php">Просмотр логов</a>
  </form>
  

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script type="text/javascript" src="scripts/log.js"> </script>
</html>