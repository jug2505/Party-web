<?php
	session_start();
  require_once 'connect.php';

  $dep_id = $_POST['dep_id'];

  $check = $connect->prepare("SELECT * FROM `departments` WHERE `dep_id` = ? ");
  $check->bind_param('s', $dep_id);
  $check->execute();
  $result = $check->get_result();
  $check->close();

  if ($result->num_rows == 0){
  	$_SESSION['message'] = 'Нет отделения с таким id';
  } else {

    $statement = $connect->prepare("SELECT * FROM `events`, `departments` WHERE departments.dep_id = events.dep_id AND departments.dep_id = ?");
    $statement->bind_param('s', $dep_id);
    $statement->execute();
    $result_stmt = $statement->get_result();
    $statement->close();

    if ($result_stmt->num_rows > 0){
      $statement = $connect->prepare("DELETE `events`, `departments` FROM  `departments` JOIN `events` ON departments.dep_id = events.dep_id WHERE departments.dep_id = ? ");
      $statement->bind_param('s', $dep_id);
      $statement->execute();
      $statement->close();
    } else {
      $statement = $connect->prepare("DELETE FROM `departments` WHERE `dep_id` = ? ");
      $statement->bind_param('s', $dep_id);
      $statement->execute();
      $statement->close();
    }
    

	  header('Location: ../admin.php');
  }
?>