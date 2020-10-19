<?php include ('statistic/stat.php');?>

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
    <title>Регионы</title>
  
  </head>
  <body>
    <!-- Header -->
    <?php include('header.html');?>
    
    <!-- Main -->
    <main role="main">
      <!-- Надпись по центру -->
      <div  style="text-align: center">
        <h2><b style="font-size:larger;">Региональные отделения</b></h2>
      </div>

      <!-- Таблица -->
      <div align="center">
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
    </main>

    <!-- Footer -->
    <?php include('footer.html');?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    <script src="scripts/yandex_map.js" type="text/javascript"></script>

  </body>
  <script type="text/javascript" src="scripts/log.js"> </script>
</html>