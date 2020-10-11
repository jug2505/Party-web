<?php

  session_start();
  require_once ('connect.php');

  $full_name = $_POST['full_name'];
  $login = $_POST['login'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password_confirm = $_POST['password_confirm'];

  if ($password === $password_confirm) {

    $password = md5($password);

    // Заменил на плейсхолдеры для защиты от sql-инъекций
    $statement = $connect->prepare("INSERT INTO `users` (`full_name`, `login`, `email`, `password`) VALUES (?, ?, ?, ?)");
    $statement->bind_param('ssss', $full_name, $login, $email, $password);
    $statement->execute();
    $statement->close();

    $_SESSION['message'] = 'Регистрация прошла успешно!';
    header('Location: ../account.php');


  } else {
    $_SESSION['message'] = 'Пароли не совпадают';
    header('Location: ../register.php');
  }

?>