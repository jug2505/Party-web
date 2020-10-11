<?php

  session_start();
  require_once 'connect.php';

  $login = $_POST['login'];
  $password = md5($_POST['password']);

  $check_user = $connect->prepare("SELECT * FROM `users` WHERE `login` = ? AND `password` = ? ");
  $check_user->bind_param('ss', $login, $password);
  $check_user->execute();
  $result = $check_user->get_result();
  if ($result->num_rows > 0) {

    $user = $result->fetch_assoc();

    $_SESSION['user'] = [
      "id" => $user['id'],
      "full_name" => $user['full_name'],
      "email" => $user['email']
    ];

    header('Location: ../profile.php');

  } else {
    $_SESSION['message'] = 'Не верный логин или пароль';
    header('Location: ../account.php');
  }
?>
