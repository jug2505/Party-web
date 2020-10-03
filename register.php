<?php
  session_start();
  if (isset($_SESSION['user'])) {
    header('Location: profile.php');
  }
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Авторизация и регистрация</title>
  <link rel="stylesheet" href="style/profile.css">
</head>
<body>

  <!-- Форма регистрации -->

  <form name="regForm" action="database/signup.php" onsubmit="return validateForm()" method="post">
    <label>ФИО</label>
    <input id="full_name" type="text" name="full_name" placeholder="Введите свое полное имя">
    <label>Логин</label>
    <input id="login" type="text" name="login" placeholder="Введите свой логин">
    <label>Почта</label>
    <input id="email" type="email" name="email" placeholder="Введите адрес своей почты">
    <label>Пароль</label>
    <input id="password" type="password" name="password" placeholder="Введите пароль">
    <label>Подтверждение пароля</label>
    <input id="password_confirm" type="password" name="password_confirm" placeholder="Подтвердите пароль">
    <button type="submit">Зарегистрироваться</button>
    <p>
      У вас уже есть аккаунт? - <a href="/">авторизируйтесь</a>!
    </p>
    <?php
      if (isset($_SESSION['message'])) {
        echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
      }
      unset($_SESSION['message']);
    ?>
    <div id="error"></div>
  </form>

</body>
<script type="text/javascript" src="scripts/reg_validation.js"></script>
</html>