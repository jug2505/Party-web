<?php
	session_start();
  require_once 'connect.php';

  $news_title = $_POST['news_title'];
  $news_text = $_POST['news_text'];
  $author_id = $_POST['author'];
  $genre_id = $_POST['genre_id'];
  $town_id = $_POST['town_id'];
  $date = date("Y-m-d");

  $check_author = $connect->prepare("SELECT * FROM `authors` WHERE `author_id` = ? ");
  $check_author->bind_param('s', $author_id);
  $check_author->execute();
  $result = $check_author->get_result();
  $check_author->close();

  if ($result->num_rows == 0){
  	$_SESSION['message'] = 'Нет автора с таким id';
    header('Location: ../admin.php');
  } else{

    $check_genre = $connect->prepare("SELECT * FROM `genre` WHERE `genre_id` = ? ");
    $check_genre->bind_param('s', $genre_id);
    $check_genre->execute();
    $result = $check_genre->get_result();
    $check_genre->close();

    if ($result->num_rows == 0){
      $_SESSION['message'] = 'Нет жанра с таким id';
      header('Location: ../admin.php');
    } else {
      $check_town = $connect->prepare("SELECT * FROM `towns` WHERE `town_id` = ? ");
      $check_town->bind_param('s', $town_id);
      $check_town->execute();
      $result = $check_town->get_result();
      $check_town->close();

      if ($result->num_rows == 0){
        $_SESSION['message'] = 'Нет города с таким id';
        header('Location: ../admin.php');
      } else {
        $path = 'uploads/' . time() . $_FILES['picture']['name'];
        move_uploaded_file($_FILES['picture']['tmp_name'], '../' . $path); 

        $statement = $connect->prepare("INSERT INTO `news` (`news_title`, `news_text`, `picture`, `date`, `author_id`) VALUES (?, ?, ?, '$date', ?)");
        $statement->bind_param('ssss', $news_title, $news_text, $path, $author_id);
        $statement->execute();
        $statement->close();

        header('Location: ../index.php');
      }
    }
  }
?>
