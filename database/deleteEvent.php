<?php
	session_start();
  require_once 'connect.php';

  $event_id = $_POST['event_id'];

  $check = $connect->prepare("SELECT * FROM `events` WHERE `event_id` = ? ");
  $check->bind_param('s', $event_id);
  $check->execute();
  $result = $check->get_result();
  $check->close();

  if ($result->num_rows == 0){
  	$_SESSION['message'] = 'Нет события с таким id';
  } else {
    $statement = $connect->prepare("DELETE FROM `events` WHERE `event_id` = ? ");
    $statement->bind_param('s', $event_id);
    $statement->execute();
    $statement->close();

	  header('Location: ../admin.php');
  }
?>