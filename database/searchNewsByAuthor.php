<?php
	require_once ('connect.php');

	$output = '';
	if (isset ($_POST['query'])){
		$search_text = $_POST['query'];
	  
	  $res = $connect->prepare(
        "SELECT `news_id`, `news_title`, `date`, `name` FROM `news`, `authors` 
        WHERE news.author_id = authors.author_id AND
        authors.name LIKE (?)  
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
					              <th scope="col">Дата</th>
					              <th scope="col">Название новости</th>
					              <th scope="col">Автор</th>
					            </tr>
					          </thead>';

			while ($row = $result->fetch_assoc()) {
				$path = 'news/news.php?id=' . $row['news_id'];
				$output .= '<tr>
	                    <td>' . $row['date'] . '</td>
	                    <td><a href=' . $path . ' style="text-decoration: none">' . $row['news_title'] . '</a></td>
	                    <td>' . $row['name'] . '</td>
	                  </tr>';
			}
			echo $output;

	  } else {
	  	echo 'Ничего не найдено';
	  }
	}
