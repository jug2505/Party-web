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
                              <button href="#news-content" type="button" class="btn btn-sm btn-outline-secondary" onclick="showNews(' . $row['news_id'] . ')">
                                Читать
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
        
        <div class="bg-light" id="news-content" style="text-align:center; display:none; padding-bottom: 50px"></div>

        <div class="bg-light" id="about" style="display:none">
          <!-- Надпись по центру -->
          <div  style="text-align:center">
            <h2><b>Вступайте в партию "Демократическая альтернатива"</b></h2>
          </div>

          <!-- Текст в две колонки -->
          <!-- Первая - информация -->
          <!-- Вторая - призыв -->
          <div class="container">
            <div class="row">
              <div class="col-12 col-md-8" id="content">
                <div>
                  <p>«Демократическая альтернатива» – это сообщество тех, кто хочет реальных перемен в стране. Мы люди самого разного возраста и самых разных занятий, но мы искренне любим свою страну и переживаем за ее судьбу.
                  </p>
                  <p>Присоединяйтесь к старейшей демократической партии России! Становитесь частью команды, которая борется за мир и свободу, уважение к человеку и равенство возможностей, европейское
                    будущее России. Приходите к нам, давайте вместе строить страну, о которой мы все мечтаем.</p>

                  <br>
                  <h4>Почему именно «ДА»?</h4>
                  <p>На протяжении всего существования мы никогда не обманывали вас, не гнались за сиюминутной популярностью. 
                    Мы всегда выступали за то, чтобы построить свободное и справедливое общество, где мнение и достоинство каждого человека будут уважаться, 
                    где каждый будет равен перед законом, иметь доступ к первоклассной медицине, современному образованию и чистой окружающей среде.
                    Мы боремся за реформы для большинства, против бедности и произвола, за то, чтобы люди перестали бояться, 
                    что отнимут бизнес или посадят в тюрьму за высказывание своей позиции. Нам важно, чтобы люди почувствовали себя в безопасности, уверенно и 
                    свободно смотрели в завтрашний день. «ДА» – партия честных людей.</p>
                  <h4>Какие идеи и взгляды я должен (должна) разделять, чтобы вступить в «ДА»?</h4>  
                  <p>«ДА» – социально-либеральная партия европейского пути. Мы верим в свободное общество и демократию, в государство для человека, в котором у каждого есть выбор и безграничные возможности. 
                    Мы уверены, что нельзя изменить страну, не отказавшись от наследия большевизма и сталинизма, лжи и коррупции, не дав людям возможность самим решать свою судьбу. Мы против милитаризма, насилия и революций. 
                    Наш путь – мирные конституционные реформы. Мы против национализма, религиозного фундаментализма и дискриминации людей по любому признаку. Мы выступаем за социальную рыночную экономику и 
                    неприкосновенность частной собственности, за отделение бизнеса от власти. Становитесь нашими единомышленниками и продвигайте наши общие ценности!</p>
                </div>
              </div>
              <div class="col-12 col-md-4" id="sidebar" style=""><div class="inner-wrapper-sticky" style="position: relative;">
                <div>
                  <img src="image/about.png">
                  <p>Приходите к нам, давайте вместе строить страну, о которой мы все мечтаем</p>
                  <a href="#" class="btn btn-primary my-2">Вступить</a>
                </div>
              </div>
            </div>
          </div>
  
        </div>


      <main class="bg-light" id="regions" style="display:none">
        <!-- Надпись по центру -->
        <div  style="text-align: center">
          <h2><b style="font-size:larger;">Региональные отделения</b></h2>
        </div>

        <!-- Таблица -->
        <div class="container" align="center">
          <table class="table table-bordered w-75">
              <thead class="thead-light">
                <tr>
                  <th scope="col">Название региона</th>
                  <th scope="col">Телефон</th>
                  <th scope="col">Email</th>
                  <th scope="col">Адрес</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Волгоградская область</td>
                  <td>8(960)881-20-01</td>
                  <td>volg@da.ru</td>
                  <td>400026, ул. Доценко, д. 43</td>
                </tr>
                <tr>
                  <td>Московская область</td>
                  <td>8(499)795-55-50</td>
                  <td>mosk@da.ru</td>
                  <td>119136 г. Москва, 3-й Сетуньский проезд, д.16</td>
                </tr>
                <tr>
                  <td>Ростовская область</td>
                  <td>8(863)269-47-25</td>
                  <td>rost@da.ru</td>
                  <td>344011, г.Ростов-на-Дону, ул. Лермонтовская, д. 38</td>
                </tr>
              </tbody>
          </table>
        </div>
        <div style="text-align: center; width: 100%;" >
          <div id="map" style="width: 75%; height: 500px; display: inline-block;"></div>
        </div>
      </div>


      </div>
    </main>

    <!-- Footer -->
    <?php include('footer.html');?>

    <!-- Для карт -->
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    <script src="scripts/yandex_map.js" type="text/javascript"></script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
  		src="https://code.jquery.com/jquery-2.2.4.js"
  		integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
  		crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>

<script type="text/javascript">
  
  // Показ повостей
  function showNews(id){
      $('#news-content').hide();

      $.ajax({
	   		url:"database/showNews.php",
				method:"POST",
				data:{id:id},
				success:function(data){
				    $('#news-content').html(data);
				}
			}).then(function(){
          $('#news-content').fadeIn(3000);
        });

    }

    var isAboutShown = false;

    $(window).scroll(function() {
      if($(window).scrollTop() + $(window).height() > $(document).height() - 50 && isAboutShown === false) {
        $('#about').fadeIn(3000);
        isAboutShown = true;
      }
      if ($(window).scrollTop() + $(window).height() > $(document).height() - 50 && isAboutShown === true){
        $('#regions').fadeIn(3000);
      }
    });

</script>