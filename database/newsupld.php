<?php

  require_once 'connect.php';

  $news_title = $_POST['news_title'];
  $news_text = $_POST['news_text'];
  $date = date("Y-m-d");

  $path = 'uploads/' . time() . $_FILES['picture']['name'];
  move_uploaded_file($_FILES['picture']['tmp_name'], '../' . $path); 
  mysqli_query($connect, "INSERT INTO `news` (`news_title`, `news_text`, `picture`, `date`) VALUES ('$news_title', '$news_text', '$path', '$date')");

  header('Location: ../index.php');

?>