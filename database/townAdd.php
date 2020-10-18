<?php
	session_start();
  require_once 'connect.php';

  $name = $_POST['name'];
  $info = $_POST['info'];

  $statement = $connect->prepare("INSERT INTO `towns` (`town_name`, `info`) VALUES (?, ?)");
  $statement->bind_param('ss', $name, $info);
  $statement->execute();
  $statement->close();
  
  $_SESSION['message'] = 'Добавление прошло успешно';
  header('Location: ../addTown.php');
?>