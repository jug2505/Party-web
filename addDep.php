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
  <form action="database/depAdd.php" method="post" enctype="multipart/form-data">
    <label>Адрес</label>
    <input type="text" name="adress" placeholder="Введите Адрес">
    <label>ID города</label>
    <input type="text" name="town_id" placeholder="Введите ID города">
    <label>Начало работы</label>
    <input type="time" name="time_start" min="06:00" max="18:00" required>
    <label>Конец работы</label>
    <input type="time" name="time_end" min="06:00" max="18:00" required>
    <button type="submit">Отправить</button>
    <?php
      if (isset($_SESSION['message'])) {
        echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
      }
      unset($_SESSION['message']);
    ?>
  </form>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script type="text/javascript" src="scripts/log.js"> </script>
</html>