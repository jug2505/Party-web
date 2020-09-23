<?php
session_start();
if (!$_SESSION['user']) {
  header('Location: /');
}
?>

<!doctype html>
<html lang="ru">
<head>

  <meta charset="UTF-8">
  <title>Профиль</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
  <link rel="stylesheet" href="style/head.css">

</head>
<body>

  <!-- Header -->
  <?php include('header.html');?>
  
  <main>

    <!-- Текст в две колонки -->
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-8" id="content">
          <div>
            <h4 style="margin: 10px 0;">Личный кабинет</h4>
            <p>Отсюда вы можете подать заявление в партию "ДА" и получить ответ на указанный email.</p>
            <a href="#" class="btn btn-primary my-2">Подать заявление</a>
          </div>
        </div>
        <div class="col-12 col-md-4" id="sidebar" style=""><div class="inner-wrapper-sticky" style="position: relative;">
          <div>
            <h2 style="margin: 10px 0;"><?= $_SESSION['user']['full_name'] ?></h2>
            <p><?= $_SESSION['user']['email'] ?></p>
            <a href="database/logout.php" class="btn btn-secondary my-2">Выход</a>
          </div>
        </div>
      </div>
    </div>
    
  </main>
  
  <!-- Footer -->
  <?php include('footer.html');?>

</body>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</html>