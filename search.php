<!DOCTYPE html>
<html lang="ru">
<head>
	<!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <script src="jquery-3.5.1.min.js"></script>

  <title>Поиск</title>
</head>
<body>

	<main>
		<div class="container">
			<br />
			<h2 style="text-align: center;">
				Поиск по словам и авторам
			</h2>
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">Поиск</span>
					<input type="text" name="search_text" id="search_text" class="form-control" />
				</div>
			</div>
			<br />
			<div id="result"></div>
		</div>
	</main>

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>

<script>
	// Страница загружена
	$(document).ready(function(){
		// Введен символ в поле поиска
		$('#search_text').keyup(function(){
			let txt = $(this).val();

			if (txt != ""){
				$.ajax({
					url:"database/searchFetch.php",
					method:"post",
					data:{search:txt},
					dataType:"text",
					success:function(data){
						$('#result').html(data);
					}
				});
			} else {
				$('#result').html("");
			}
		});
	});
</script>>