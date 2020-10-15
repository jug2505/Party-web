<?php

  session_start();
  require_once ('connect.php');

  $news_id = $_POST['news_id'];
  
  $check_news = $connect->prepare("SELECT * FROM `news` WHERE `news_id` = ? ");
  $check_news->bind_param('s', $news_id);
  $check_news->execute();
  $result = $check_news->get_result();
  $data = $result->fetch_assoc();
  $check_news->close();
  if ($result->num_rows == 0){
    $_SESSION['message'] = 'Нет новости с таким id';
    header('Location: ../delete.php');
  } else {
    unlink(realpath("../" . $data['picture']));
    $statement = $connect->prepare("DELETE FROM  `news` WHERE `news_id` = ?");
    $statement->bind_param('s', $news_id);
    $statement->execute();
    $statement->close();

    header('Location: ../index.php');
  }

?>