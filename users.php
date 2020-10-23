<?php require_once ('database/connect.php'); ?>
<?php
session_start();

if (!isset($_SESSION['user'])) {
  header('Location: /');
}

if ($_SESSION['user']['full_name'] !== 'admin' && $_SESSION['user']['email'] !== 'admin@admin'){
  header('Location: /');
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

    <title>Пользователи</title>
  
  </head>
  <body>  
    <!-- Main -->
    <main role="main">
      <!-- Надпись по центру -->
      <div style="text-align: center">
        <h2><b style="font-size:larg;">Таблица всех пользователей</b></h2>
      </div>

      <!-- Таблица -->
      <div align="center">
        <table class="table table-bordered w-50">
          <thead class="thead-light">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Имя</th>
              <th scope="col">Login</th>
              <th scope="col">email</th>
            </tr>
          </thead>
            <tbody>
              
            <?php
              // Получаем данные
              $res = mysqli_query($connect, "SELECT * FROM `users` ");

              // Вывод строк таблицы в цикле
              while ($row = mysqli_fetch_assoc($res)){
                echo '<tr>
                       <td>' . $row['id'] . '</td>
                       <td>' . $row['full_name'] . '</td>
                       <td>' . $row['login'] . '</td>
                       <td>' . $row['email'] . '</td>
                      </tr>';
              }
            ?>
            </tbody>
        </table>
      </div>
        
    </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
