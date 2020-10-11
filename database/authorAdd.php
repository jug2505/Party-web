<?php
	session_start();
  require_once 'connect.php';

  $name = $_POST['name'];
  $info = $_POST['author_info'];

  if ($name !== "" and $info !== ""){
  		$statement = $connect->prepare("INSERT INTO `authors` (`name`, `info`) VALUES (?, ?)");
      $statement->bind_param('ss', $name, $info);
      $statement->execute();
      $statement->close();
  	} else {
  		if ($name !== "" and $info === ""){
	  		$statement = $connect->prepare("INSERT INTO `authors` (`name`) VALUES (?)");
	      $statement->bind_param('s', $name);
	      $statement->execute();
	      $statement->close();
	  	} else {
	  		if ($name === "" and $info !== ""){
		  		$statement = $connect->prepare("INSERT INTO `authors` (`info`) VALUES (?)");
		      $statement->bind_param('s', $info);
		      $statement->execute();
		      $statement->close();
		  	}
	  	}
  	}
  
  $_SESSION['message'] = 'Добавление прошло успешно';
  header('Location: ../addAuthor.php');
?>