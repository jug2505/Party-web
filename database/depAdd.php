<?php
	session_start();
  require_once 'connect.php';

  $adress = $_POST['adress'];
  $time_start = $_POST['time_start'];
  $time_end = $_POST['time_end'];
  $town_id = $_POST['town_id'];

  $check_town = $connect->prepare("SELECT * FROM `towns` WHERE `town_id` = ? ");
  $check_town->bind_param('s', $town_id);
  $check_town->execute();
  $result = $check_town->get_result();
  $check_town->close();

  if ($result->num_rows == 0){
    $_SESSION['message'] = 'Нет города с таким id';
    header('Location: ../addDep.php');
  } else {
    $statement = $connect->prepare("INSERT INTO `departments` (`adress`, `time_start`, `time_end`, `town_id`) VALUES (?, ?, ?, ?)");
    $statement->bind_param('ssss', $adress, $time_start, $time_end, $town_id);
    $statement->execute();
    $statement->close();
    
    $_SESSION['message'] = 'Добавление прошло успешно';
    header('Location: ../addDep.php');
  }
?>