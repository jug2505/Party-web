<?php
	session_start();
  require_once 'connect.php';

  $genre_id = $_POST['genre_id'];

  $check = $connect->prepare("SELECT * FROM `genre` WHERE `genre_id` = ? ");
  $check->bind_param('s', $genre_id);
  $check->execute();
  $result = $check->get_result();
  $check->close();

  if ($result->num_rows == 0){
  	$_SESSION['message'] = 'Нет жанра с таким id';
  } else {

    $statement = $connect->prepare("SELECT * FROM `genre`, `news` WHERE news.genre_id = genre.genre_id AND news.genre_id = ?");
    $statement->bind_param('s', $genre_id);
    $statement->execute();
    $result_stmt = $statement->get_result();

    if ($result_stmt->num_rows > 0){
      $data = $result_stmt->fetch_assoc();
      $statement->close();
      unlink(realpath("../" . $data['picture']));

      $statement = $connect->prepare("DELETE `news`, `genre` FROM  `news` JOIN `genre` ON news.genre_id = genre.genre_id WHERE news.genre_id = ? ");
      $statement->bind_param('s', $genre_id);
      $statement->execute();
      $statement->close();
    } else {
      $statement = $connect->prepare("DELETE FROM `genre` WHERE `genre_id` = ? ");
      $statement->bind_param('s', $genre_id);
      $statement->execute();
      $statement->close();
    }

	  header('Location: ../admin.php');
  }
?>