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
  <title>Добавление города</title>
  <link rel="stylesheet" href="style/profile.css">
</head>
<body>

<!-- Форма администрирования -->
  <form action="database/eventAdd.php" method="post" enctype="multipart/form-data">
    <label>Информация</label>
    <input type="text" name="info" placeholder="Введите информация">
    <label>Начало события</label>
    <input type="datetime-local" name="time" required>
    <label>ID отделения</label>
    <input type="text" name="dep_id" placeholder="Введите ID отделения">
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