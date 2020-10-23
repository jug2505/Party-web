<?php
	session_start();
  require_once 'connect.php';

  $name = $_POST['name'];
  $info = $_POST['author_info'];
  $town_id = $_POST['town_id'];

  $check_town = $connect->prepare("SELECT * FROM `towns` WHERE `town_id` = ? ");
  $check_town->bind_param('s', $town_id);
  $check_town->execute();
  $result = $check_town->get_result();
  $check_town->close();

  if ($result->num_rows == 0){
    $_SESSION['message'] = 'Нет города с таким id';
    header('Location: ../addAuthor.php');
  } else {
    $statement = $connect->prepare("INSERT INTO `authors` (`name`, `info`, `town_id`) VALUES (?, ?, ?)");
    $statement->bind_param('sss', $name, $info, $town_id);
    $statement->execute();
    $statement->close();
    
    $_SESSION['message'] = 'Добавление прошло успешно';
    header('Location: ../addAuthor.php');
  }
?>
