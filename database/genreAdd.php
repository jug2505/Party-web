<?php
	session_start();
  require_once 'connect.php';

  $info = $_POST['genre_info'];

  $statement = $connect->prepare("INSERT INTO `genre` (`genre_info`) VALUES (?)");
  $statement->bind_param('s',$info);
  $statement->execute();
  $statement->close();
  
  $_SESSION['message'] = 'Добавление прошло успешно';
  header('Location: ../addTown.php');
?>
