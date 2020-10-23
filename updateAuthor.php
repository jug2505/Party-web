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
  <title>Редактирование жирналиста</title>
  <link rel="stylesheet" href="style/profile.css">
</head>
<body>

<!-- Форма администрирования -->
  <form action="database/authorUpdate.php" method="post" enctype="multipart/form-data">
    <label>ID журналиста <a href="authors.php" class="stretched-link">(Посмотреть всех авторов)</a></label>
    <input type="text" name="author" placeholder="Введите ID автора новости">
    <label>ФИО</label>
    <input type="text" name="name" placeholder="Введите ФИО журналиста">
    <label>Доп. информация</label>
    <input type="text" name="author_info" placeholder="Введите дополнительную информацию">
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