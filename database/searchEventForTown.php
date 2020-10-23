<?php
	require_once ('connect.php');

	$output = '';
	if (isset ($_POST['query'])){
		$search_text = $_POST['query'];
	  
	  $res = $connect->prepare(
      "SELECT `adress`, `time`, events.info AS info FROM `departments`, `events`, `towns`
      WHERE towns.town_id = departments.town_id AND events.dep_id = departments.dep_id 
      AND towns.town_name LIKE (?) ORDER BY events.time DESC LIMIT 10"
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
					              <th scope="col">Время начала</th>
					              <th scope="col">Адрес</th>
					              <th scope="col">Информация</th>
					            </tr>
					          </thead>';

			while ($row = $result->fetch_assoc()) {
				$output .= '<tr>
	                    <td>' . $row['time'] . '</td>
	                    <td>' . $row['adress'] . '</a></td>
	                    <td>' . $row['info'] . '</td>
	                  </tr>';
			}
			echo $output;

	  } else {
	  	echo 'Ничего не найдено';
	  }
	}
?>
