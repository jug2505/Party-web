<?php
session_start();

if (isset($_SESSION['user'])) {
  header('Location: profile.php');
}

?>

<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Авторизация и регистрация</title>
  <link rel="stylesheet" href="style/profile.css">
</head>
<body>

<!-- Форма авторизации -->

  <form action="database/signin.php" method="post">
    <label>Логин</label>
    <input type="text" name="login" placeholder="Введите свой логин">
    <label>Пароль</label>
    <input type="password" name="password" placeholder="Введите пароль">
    <button type="submit">Войти</button>
    <p>
      У вас ещё нет аккаунта? - <a href="/register.php">зарегистрируйтесь</a>!
    </p>
    <?php
      if (isset($_SESSION['message'])) {
        echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
      }
      unset($_SESSION['message']);
    ?>
  </form>

</body>
</html>