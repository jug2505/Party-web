<?php
	require_once ('connect.php');

	$output = '';
	if (isset ($_POST['query'])){
		$search_text = $_POST['query'];
	  
	  $res = $connect->prepare(
        "SELECT `genre_info`, `town_name` FROM `news`, `towns`, `genre` 
        WHERE news.town_id = towns.town_id AND genre.genre_id = news.genre_id
        AND `genre_info` LIKE (?) 
        ORDER BY `date` DESC"
    );
    $search_text = '%' . $search_text . '%';
	  $res->bind_param('s', $search_text);
    $res->execute();
    $result = $res->get_result();

	  if ($result->num_rows > 0){
	  	$output .= '<h4 style="text-align: center;">Результаты поиска</h4>';
	  	$output .= '<table class="table ">
		  							<thead class="thead-light">
					            <tr>
					              <th scope="col">Город</th>
                        <th scope="col">Жанр</th>
					            </tr>
					          </thead>';

			while ($row = $result->fetch_assoc()) {
				$output .= '<tr>
	                    <td>' . $row['town_name'] . '</td>
                      <td>' . $row['genre_info'] . '</td>
	                  </tr>';
			}
			echo $output;

	  } else {
	  	echo 'Ничего не найдено';
	  }
	}
