<?php
	require_once ('connect.php');

	$output = '';
	if (isset ($_POST['genre']) and isset($_POST['town'])){
    $search_genre = $_POST['genre'];
    $search_town = $_POST['town'];
	  
	  $res = $connect->prepare(
        "SELECT `news_id`, `news_title`, `date`, `genre_info`, `town_name` FROM `news`, `genre`, `towns` 
        WHERE news.town_id = towns.town_id AND genre.genre_id = news.genre_id AND
        `genre_info` LIKE (?) AND `town_name` LIKE (?) 
        ORDER BY `date` DESC"
    );
    $search_genre = '%' . $search_genre . '%';
    $search_town = '%' . $search_town . '%';
	  $res->bind_param('ss', $search_genre, $search_town);
    $res->execute();
    $result = $res->get_result();

	  if ($result->num_rows > 0){
	  	$output .= '<h4 style="text-align: center;">Результаты поиска</h4>';
	  	$output .= '<table class="table ">
		  							<thead class="thead-light">
					            <tr>
					              <th scope="col">Дата</th>
					              <th scope="col">Название новости</th>
                        <th scope="col">Жанр</th>
                        <th scope="col">Город</th>
					            </tr>
					          </thead>';

			while ($row = $result->fetch_assoc()) {
				$path = 'news/news.php?id=' . $row['news_id'];
				$output .= '<tr>
	                    <td>' . $row['date'] . '</td>
	                    <td><a href=' . $path . ' style="text-decoration: none">' . $row['news_title'] . '</a></td>
                      <td>' . $row['genre_info'] . '</td>
                      <td>' . $row['town_name'] . '</td>
	                  </tr>';
			}
			echo $output;

	  } else {
	  	echo 'Ничего не найдено';
	  }
	}
