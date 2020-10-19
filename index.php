<?php include_once ('statistic/stat.php');?>
<?php require_once ('database/connect.php'); ?>
<!doctype html>
<html lang="ru">
  <head>
    <!-- Мета-теги -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <!-- Стили -->
    <style>
      @import url("style/head.css");  
    </style>
    
    <title>ДА!</title>
  
  </head> 
  <body>
    <!-- Header -->
    <?php include('header.html');?>
    
    <!-- Main -->
    <main role="main">

      <!-- Видео в фоне -->
      <div class="jumbotron jumbotron-fluid">
        <video autoplay muted loop >    
          <source src="video/Volgograd.mp4" type="video/mp4">
        </video>

        <!-- Надпись перед видео -->
        <div style="text-align: center">
          <div class="container text-white" >
            <h1 class="display-4">Демократическая альтернатива</h1>
            <p class="lead">Мы ждём вас. Вступайте в партию “Демократическая альтернатива”</p>
            <p>
              <!-- Кнопки со ссылками на другие страницы -->
              <a href="about.php" class="btn btn-primary my-2">О нас</a>
              <a href="#" class="btn btn-secondary my-2">Вступить в партию</a>
            </p>
          </div>
        </div>
      </div>

      <!-- Альбом с новостями-->
      <div class="album py-5 bg-light">

        <!-- Надпись по центру "Наши новости" -->
        <div style="text-align: center">
          <h2><b style="font-size:larger;">Наши новости</b></h2>
        </div>

        <div class="container">
          <div class="row">
            

            <?php
              // Получаем данные за последние 6 дней
              $res = mysqli_query($connect, "SELECT `news_id`,`news_title`, `news_text`, `picture`, `name` FROM `news`, `authors` WHERE news.author_id = authors.author_id ORDER BY `date` DESC LIMIT 6");
              // Вывод строк таблицы в цикле
              for ($i = 1; $i < 7; $i++){
                $row = mysqli_fetch_assoc($res);
                $path = 'news/news.php?id=' . $row['news_id'];
                echo '<div class="col-md-4">
                      <div class="card mb-4 shadow-sm">
                        <!-- Картинка новости id.jpeg -->
                        <image src=' . $row['picture'] . ' width="100%" height="225">
                        <div class="card-body">
                          <!-- Текст новости -->
                          <p class="card-text">'. $row['news_title'] . '</p>
                          <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                              <!-- Кнопка открытия новости -->
                              <button href="/profile.php" type="button" class="btn btn-sm btn-outline-secondary">
                              <a href=' . $path . ' style="text-decoration: none">Читать</a>
                              </button>
                              <div style="margin-left:30px">
                                <p>Автор:' . $row['name'] . '</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>';    
              }
            ?>

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

  <script type="text/javascript" src="scripts/log.js"> </script>
</html>