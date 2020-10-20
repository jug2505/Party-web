<?php
session_start();

if (!isset($_SESSION['user'])) {
  header('Location: /');
}

if ($_SESSION['user']['full_name'] !== 'admin' && $_SESSION['user']['email'] !== 'admin@admin'){
  header('Location: /');
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
  <title>Поиск</title>
</head>
<body>

	<main>
		

		<div class="container">
			<br />
			<h2 style="text-align: center;">
				Поиск логов по пользователю
			</h2>
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">Поиск</span>
					<input type="text" name="search_text" id="search_text" class="form-control" />
				</div>
			</div>
			<br />
			<div id="result"></div>
	</main>
 	
 	 <script
  		src="https://code.jquery.com/jquery-2.2.4.js"
  		integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
  		crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />

</body>
<script type="text/javascript" src="scripts/log.js"> </script>
</html>

<script type="text/javascript">
	// Страница загружена
	$(document).ready(function(){
		function load_data(query){
			$.ajax({
	   			url:"database/searchLogs.php",
				method:"POST",
				data:{query:query},
				success:function(data){
				    $('#result').html(data);
				}
			});
		}

		load_data();
		
		// Введен символ в поле поиска
		$('#search_text').keyup(function(){
			var search = $(this).val();
			if(search != ''){
		   		load_data(search);
		  	} else {
		   		load_data();
		  	}
		});
	});
</script>