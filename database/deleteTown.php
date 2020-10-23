<?php
	session_start();
  require_once 'connect.php';

  $town_id = $_POST['town_id'];

  $check = $connect->prepare("SELECT * FROM `towns` WHERE `town_id` = ? ");
  $check->bind_param('s', $town_id);
  $check->execute();
  $result = $check->get_result();
  $check->close();

  if ($result->num_rows == 0){
  	$_SESSION['message'] = 'Нет города с таким id';
  } else {
    $statement = $connect->prepare("SELECT * FROM `towns`, `authors` WHERE authors.town_id = towns.town_id AND towns.town_id = ?");
    $statement->bind_param('s', $town_id);
    $statement->execute();
    $result_stmt = $statement->get_result();
    $statement->close();

    if ($result_stmt->num_rows > 0){
      $statement = $connect->prepare("UPDATE `authors` SET `town_id` = NULL WHERE `town_id` = ?");
      $statement->bind_param('s', $town_id);
      $statement->execute();
      $statement->close();
    }

    $statement = $connect->prepare("SELECT * FROM `towns`, `news` WHERE news.town_id = towns.town_id AND towns.town_id = ?");
    $statement->bind_param('s', $town_id);
    $statement->execute();
    $result_stmt = $statement->get_result();
    $statement->close();

    if ($result_stmt->num_rows > 0){

      $statement = $connect->prepare("DELETE `news`, `towns` FROM  `news` JOIN `towns` ON news.town_id = towns.town_id WHERE towns.town_id = ? ");
      $statement->bind_param('s', $town_id);
      $statement->execute();
      $statement->close();
    } else {
      $statement = $connect->prepare("DELETE FROM `towns` WHERE `town_id` = ? ");
      $statement->bind_param('s', $town_id);
      $statement->execute();
      $statement->close();
    }

    $statement = $connect->prepare("SELECT * FROM `departments` WHERE departments.town_id = ?");
    $statement->bind_param('s', $town_id);
    $statement->execute();
    $result_stmt = $statement->get_result();
    $statement->close();

    if ($result_stmt->num_rows > 0){
      $statement = $connect->prepare("SELECT * FROM `events`, `departments` WHERE departments.dep_id = events.dep_id AND departments.town_id = ?");
      $statement->bind_param('s', $town_id);
      $statement->execute();
      $result_stmt = $statement->get_result();
      $statement->close();

      if ($result_stmt->num_rows > 0){
        $statement = $connect->prepare("DELETE `events`, `departments` FROM  `departments` JOIN `events` ON departments.dep_id = events.dep_id WHERE departments.town_id = ? ");
        $statement->bind_param('s', $town_id);
        $statement->execute();
        $statement->close();
      } else {
        $statement = $connect->prepare("DELETE FROM `departments` WHERE `town_id` = ? ");
        $statement->bind_param('s', $town_id);
        $statement->execute();
        $statement->close();
      }
    }


	  header('Location: ../admin.php');
  }
?>
