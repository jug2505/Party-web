<?php
	session_start();
  require_once 'connect.php';

  $author_id = $_POST['author_id'];

  $check_author = $connect->prepare("SELECT * FROM `authors` WHERE `author_id` = ? ");
  $check_author->bind_param('s', $author_id);
  $check_author->execute();
  $result = $check_author->get_result();
  $check_author->close();

  if ($result->num_rows == 0){
  	$_SESSION['message'] = 'Нет автора с таким id';
  } else {

    $statement = $connect->prepare("SELECT * FROM `authors`, `news` WHERE news.author_id = authors.author_id AND news.author_id = ?");
    $statement->bind_param('s', $author_id);
    $statement->execute();
    $result_stmt = $statement->get_result();
    $statement->close();

    if ($result_stmt->num_rows > 0){
      $statement = $connect->prepare("DELETE `news`, `authors` FROM  `news` JOIN `authors` ON news.author_id = authors.author_id WHERE news.author_id = ? ");
      $statement->bind_param('s', $author_id);
      $statement->execute();
      $statement->close();
    } else {
      $statement = $connect->prepare("DELETE FROM `authors` WHERE `author_id` = ? ");
      $statement->bind_param('s', $author_id);
      $statement->execute();
      $statement->close();
    }

	  header('Location: ../admin.php');
  }
?>