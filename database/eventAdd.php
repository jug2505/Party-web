<?php
	session_start();
  require_once 'connect.php';

  $info = $_POST['info'];
  $time = $_POST['time'];
  $dep_id = $_POST['dep_id'];

  $check_dep = $connect->prepare("SELECT * FROM `departments` WHERE `dep_id` = ? ");
  $check_dep->bind_param('s', $dep_id);
  $check_dep->execute();
  $result = $check_dep->get_result();
  $check_dep->close();

  if ($result->num_rows == 0){
    $_SESSION['message'] = 'Нет отделения с таким id';
    header('Location: ../addEvent.php');
  } else {
    $statement = $connect->prepare("INSERT INTO `events` (`info`, `time`, `dep_id`) VALUES (?, ?, ?)");
    $statement->bind_param('sss', $info, $time, $dep_id);
    $statement->execute();
    $statement->close();
    
    $_SESSION['message'] = 'Добавление прошло успешно';
    header('Location: ../addEvent.php');
  }
?>
