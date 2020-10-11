<?php
	session_start();
  require_once 'connect.php';

  $author_id = $_POST['author'];
  $name = $_POST['name'];
  $info = $_POST['author_info'];

  $check_author = $connect->prepare("SELECT * FROM `authors` WHERE `author_id` = ?");
  $check_author->bind_param('s', $author_id);
  $check_author->execute();
  $result_author = $check_author->get_result();
  $check_author->close();

  if ($result_author->num_rows == 0){
    $_SESSION['message'] = 'Нет автора с таким id';
  } else {
  	if ($name !== "" and $info !== ""){
  		$statement = $connect->prepare("UPDATE `authors` SET `info` = ?, `name` = ? WHERE `author_id` = ?");
      $statement->bind_param('sss', $info, $name, $author_id);
      $statement->execute();
      $statement->close();
  	} else {
  		if ($name !== "" and $info === ""){
	  		$statement = $connect->prepare("UPDATE `authors` SET `name` = ? WHERE `author_id` = ?");
	      $statement->bind_param('ss', $name, $author_id);
	      $statement->execute();
	      $statement->close();
	  	} else {
	  		if ($name === "" and $info !== ""){
		  		$statement = $connect->prepare("UPDATE `authors` SET `info` = ? WHERE `author_id` = ?");
		      $statement->bind_param('ss', $info, $author_id);
		      $statement->execute();
		      $statement->close();
		  	}
	  	}
  	}
  }
  header('Location: ../updateAuthor.php');
?>