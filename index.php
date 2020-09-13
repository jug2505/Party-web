<!doctype html>
<html lang="ru">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

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

        <div align=center>
          <div class="container text-white" >
            <h1 class="display-4">Демократическая альтернатива</h1>
            <p class="lead">Мы ждём вас. Вступайте в партию “Демократическая альтернатива”</p>
            <p>
              <a href="about.php" class="btn btn-primary my-2">О нас</a>
              <a href="#" class="btn btn-secondary my-2">Вступить в партию</a>
            </p>
          </div>
        </div>
      </div>

      <!-- Альбом с новостями-->
      <div class="album py-5 bg-light">
        <div align="center">
          <h2><b style="font-size:larger;">Наши новости</b></h2>
        </div>
        <div class="container">

          <div class="row">

            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <image src="image/6.jpeg" width="100%" height="225">
                <div class="card-body">
                  <p class="card-text">В Волгоградской области наши волонтеры очистили леса от более чем 25 тонн мусора.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">Читать</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <image src="image/5.jpeg" width="100%" height="225">
                <div class="card-body">
                  <p class="card-text">Выборы 13 сентября. Голосуйте за наших кондидатов.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">Читать</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <image src="image/4.jpeg" width="100%" height="225">
                <div class="card-body">
                  <p class="card-text">В «ДА» пройдёт открытая дискуссия о современном журналистском расследовании</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">Читать</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <image src="image/3.jpeg" width="100%" height="225">
                <div class="card-body">
                  <p class="card-text">Глава «ДА» посетил города Миасс, Чебаркуль и Златоуст в Челябинской области</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">Читать</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <image src="image/2.jpeg" width="100%" height="225">
                <div class="card-body">
                  <p class="card-text">Требуем прекратить преследование эколога Казимира Петрова</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">Читать</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <image src="image/1.jpeg" width="100%" height="225">
                <div class="card-body">
                  <p class="card-text">«Всё, что происходит в стране, зависит от вас»: Артём Олейник поздравил учеников гимназии «Согол» с началом учебного года</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">Читать</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            </div>
          </div>
        </div>
      </div>
    </main>

    <?php include('footer.html');?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>