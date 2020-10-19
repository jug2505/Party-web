<?php
	require_once ('connect.php');

	$output = '';
	if (isset ($_POST['query'])){
		$search_text = $_POST['query'];
	  
	  $res = $connect->prepare(
        "SELECT `adress`, `town_name`, `time_start`, `time_end` FROM `departments`, `towns` 
        WHERE departments.town_id = towns.town_id
        AND `town_name` LIKE (?)"
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
                        <th scope="col">Адрес</th>
                        <th scope="col">Начало работы</th>
                        <th scope="col">Конец работы</th>
					            </tr>
					          </thead>';

			while ($row = $result->fetch_assoc()) {
				$output .= '<tr>
	                    <td>' . $row['town_name'] . '</td>
                      <td>' . $row['adress'] . '</td>
                      <td>' . $row['time_start'] . '</td>
                      <td>' . $row['time_end'] . '</td>
	                  </tr>';
			}
			echo $output;

	  } else {
	  	echo 'Ничего не найдено';
	  }
	}
