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
				Поиск новостей по городу и жанру
			</h2>
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">Поиск</span>
					<input type="text" name="search_genre" id="search_genre" class="form-control" placeholder="Жанр" />
                    <input type="text" name="search_town" id="search_town" class="form-control" placeholder="Город"/>
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
</html>

<script type="text/javascript">
	// Страница загружена
	$(document).ready(function(){
		function load_data(genre, town){
			$.ajax({
	   			url:"database/searchNewsByGenreAndTown.php",
				method:"POST",
				data:{genre:genre, town:town},
				success:function(data){
				    $('#result').html(data);
				}
			});
		}

        load_data();
        var search_genre = '';
        var search_town = '';
		
		// Введен символ в поле поиска
		$('#search_genre').keyup(function(){
			search_genre = $(this).val();
			if(search != ''){
		   		load_data(search_genre, search_town);
		  	} else {
		   		load_data();
		  	}
        });
        
        $('#search_town').keyup(function(){
			search_town = $(this).val();
			if(search_town != ''){
		   		load_data(search_genre, search_town);
		  	} else {
		   		load_data();
		  	}
		});
	});
</script>