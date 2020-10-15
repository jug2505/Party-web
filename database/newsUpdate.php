<?php
	session_start();
  require_once 'connect.php';

  $news_id = $_POST['news_id'];
  $news_title = $_POST['news_title'];
  $news_text = $_POST['news_text'];
  $author_id = $_POST['author'];
  $picture_name = $_FILES['picture']['name'];
 
  $check_news = $connect->prepare("SELECT * FROM `news` WHERE `news_id` = ? ");
  $check_news->bind_param('s', $news_id);
  $check_news->execute();
  $result = $check_news->get_result();
  $data = $result->fetch_assoc();
  $check_news->close();

  if ($result->num_rows == 0){
    $_SESSION['message'] = 'Нет новости с таким id';
  } else {
    if ($author_id !== ""){
      $check_author = $connect->prepare("SELECT * FROM `authors` WHERE `author_id` = ? ");
      $check_author->bind_param('s', $author_id);
      $check_author->execute();
      $result_author = $check_author->get_result();
      $check_author->close();

      if ($result->num_rows == 0){
        $_SESSION['message'] = 'Нет автора с таким id';

      } else {
        if ($news_title !== "" and $picture_name !== "" and $news_text !== ""){
          unlink(realpath("../" . $data['picture']));
          $path = 'uploads/' . time() . $picture_name;
          move_uploaded_file($_FILES['picture']['tmp_name'], '../' . $path); 
          
          $statement = $connect->prepare("UPDATE `news` SET `news_title` = ?, `picture` = ?, `news_text` = ?, `author_id` = ? WHERE `news_id` = ?");
          $statement->bind_param('sssss', $news_title, $path, $news_text, $author_id, $news_id);
          $statement->execute();
          $statement->close();

        } else {
          if ($news_title !== "" and $picture_name !== "" and $news_text === ""){
            unlink(realpath("../" . $data['picture']));
            $path = 'uploads/' . time() . $picture_name;
            move_uploaded_file($_FILES['picture']['tmp_name'], '../' . $path); 
            
            $statement = $connect->prepare("UPDATE `news` SET `news_title` = ?, `picture` = ?, `author_id` = ? WHERE `news_id` = ?");
            $statement->bind_param('ssss', $news_title, $path, $author_id, $news_id);
            $statement->execute();
            $statement->close();
          
          } else {
            if ($news_title === "" and $picture_name !== "" and $news_text !== ""){
              unlink(realpath("../" . $data['picture']));
              $path = 'uploads/' . time() . $picture_name;
              move_uploaded_file($_FILES['picture']['tmp_name'], '../' . $path); 
              
              $statement = $connect->prepare("UPDATE `news` SET `picture` = ?, `news_text` = ?, `author_id` = ? WHERE `news_id` = ?");
              $statement->bind_param('ssss', $path, $news_text, $author_id, $news_id);
              $statement->execute();
              $statement->close();

            } else {
              if ($news_title !== "" and $picture_name === "" and $news_text !== ""){  
                $statement = $connect->prepare("UPDATE `news` SET `news_title` = ?, `news_text` = ?, `author_id` = ? WHERE `news_id` = ?");
                $statement->bind_param('ssss', $news_title, $news_text, $author_id, $news_id);
                $statement->execute();
                $statement->close();

              } else {
                if ($news_title === "" and $picture_name !== "" and $news_text === ""){
                  unlink(realpath("../" . $data['picture']));
                  $path = 'uploads/' . time() . $picture_name;
                  move_uploaded_file($_FILES['picture']['tmp_name'], '../' . $path); 
                  
                  $statement = $connect->prepare("UPDATE `news` SET `picture` = ?, `author_id` = ? WHERE `news_id` = ?");
                  $statement->bind_param('sss', $path, $author_id, $news_id);
                  $statement->execute();
                  $statement->close();

                } else {
                  if ($news_title !== "" and $picture_name === "" and $news_text === ""){
                    $statement = $connect->prepare("UPDATE `news` SET `news_title` = ?, `author_id` = ? WHERE `news_id` = ?");
                    $statement->bind_param('sss', $news_title, $author_id, $news_id);
                    $statement->execute();
                    $statement->close();

                  } else {
                    if ($news_title === "" and $picture_name === "" and $news_text !== ""){
                      $statement = $connect->prepare("UPDATE `news` SET `news_text` = ?, `author_id` = ? WHERE `news_id` = ?");
                      $statement->bind_param('sss', $news_text, $author_id, $news_id);
                      $statement->execute();
                      $statement->close();

                    }
                  }
                }
              }
            }
          }
        }
      }
    } else {
      if ($news_title !== "" and $picture_name !== "" and $news_text !== ""){
        unlink(realpath("../" . $data['picture']));
        $path = 'uploads/' . time() . $picture_name;
        move_uploaded_file($_FILES['picture']['tmp_name'], '../' . $path); 
        
        $statement = $connect->prepare("UPDATE `news` SET `news_title` = ?, `picture` = ?, `news_text` = ? WHERE `news_id` = ?");
        $statement->bind_param('ssss', $news_title, $path, $news_text, $news_id);
        $statement->execute();
        $statement->close();

        } else {
          if ($news_title !== "" and $picture_name !== "" and $news_text === ""){
            unlink(realpath("../" . $data['picture']));
            $path = 'uploads/' . time() . $picture_name;
            move_uploaded_file($_FILES['picture']['tmp_name'], '../' . $path); 
            
            $statement = $connect->prepare("UPDATE `news` SET `news_title` = ?, `picture` = ? WHERE `news_id` = ?");
            $statement->bind_param('sss', $news_title, $path, $news_id);
            $statement->execute();
            $statement->close();
          
          } else {
            if ($news_title === "" and $picture_name !== "" and $news_text !== ""){
              unlink(realpath("../" . $data['picture']));
              $path = 'uploads/' . time() . $picture_name;
              move_uploaded_file($_FILES['picture']['tmp_name'], '../' . $path); 
              
              $statement = $connect->prepare("UPDATE `news` SET `picture` = ?, `news_text` = ? WHERE `news_id` = ?");
              $statement->bind_param('sss', $path, $news_text, $news_id);
              $statement->execute();
              $statement->close();

            } else {
              if ($news_title !== "" and $picture_name === "" and $news_text !== ""){  
                $statement = $connect->prepare("UPDATE `news` SET `news_title` = ?, `news_text` = ? WHERE `news_id` = ?");
                $statement->bind_param('sss', $news_title, $news_text, $news_id);
                $statement->execute();
                $statement->close();

              } else {
                if ($news_title === "" and $picture_name !== "" and $news_text === ""){
                  unlink(realpath("../" . $data['picture']));
                  $path = 'uploads/' . time() . $picture_name;
                  move_uploaded_file($_FILES['picture']['tmp_name'], '../' . $path); 
                  
                  $statement = $connect->prepare("UPDATE `news` SET `picture` = ? WHERE `news_id` = ?");
                  $statement->bind_param('ss', $path, $news_id);
                  $statement->execute();
                  $statement->close();

                } else {
                  if ($news_title !== "" and $picture_name === "" and $news_text === ""){
                    $statement = $connect->prepare("UPDATE `news` SET `news_title` = ? WHERE `news_id` = ?");
                    $statement->bind_param('ss', $news_title, $news_id);
                    $statement->execute();
                    $statement->close();

                  } else {
                    if ($news_title === "" and $picture_name === "" and $news_text !== ""){
                      $statement = $connect->prepare("UPDATE `news` SET `news_text` = ? WHERE `news_id` = ?");
                      $statement->bind_param('ss', $news_text, $news_id);
                      $statement->execute();
                      $statement->close();

                    }
                  }
                }
              }
            }
          }
        }

    }
    
  }
  header('Location: ../updateNews.php');
?>
