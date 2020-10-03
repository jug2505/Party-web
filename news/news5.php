<?php include ('../statistic/stat.php');?>
<?php require_once ('../database/connect.php'); ?>
<?php  
  $res = mysqli_query($connect, "SELECT * FROM `news` ORDER BY `date` DESC LIMIT 5");
  for ($count = 0; $count < 5; $count++) {
    $data = mysqli_fetch_assoc($res);
  }
?>

<!doctype html>
<html lang="ru">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <style>
      @import url("../style/head.css");  
    </style>
    <title>Новости</title>
  
  </head>
  <body>
    <!-- Header -->
    <?php include('header.html');?>
    
    <!-- Main -->
    <main role="main">
      <!-- Надпись по центру -->
      <div align="center">
        <h2><?= $data['news_title'] ?></h2>
      </div>

      <!-- Текст в две колонки -->
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-8" id="content">
            <div>
              <?= $data['news_text'] ?>
            </div>
          </div>
          <div class="col-12 col-md-4" id="sidebar" style=""><div class="inner-wrapper-sticky" style="position: relative;">
            <div>
              <img src=<?= "../" . $data['picture'] ?> width="100%" height="225">
            </div>
          </div>
        </div>
      </div>
    
      
        
    </main>

    <!-- Footer -->
    <?php include('footer.html');?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>