<?php
	require_once ('connect.php');

	$output = '';
	if (isset ($_POST['query'])){
		$search_text = $_POST['query'];
	  
	  $res = $connect->prepare(
        "SELECT `date`, `page`, `user_id`, `full_name`, `login` FROM `logs`, `users` 
        WHERE `user_id` = users.id
        AND `login` LIKE (?) ORDER BY `date` DESC"
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
                        <th scope="col">Страница</th>
                        <th scope="col">ID пользователя</th>
                        <th scope="col">Имя пользователя</th>
                        <th scope="col">Логин</th>
					            </tr>
					          </thead>';

			while ($row = $result->fetch_assoc()) {
				$output .= '<tr>
	                    <td>' . $row['date'] . '</td>
                      <td>' . $row['page'] . '</td>
                      <td>' . $row['user_id'] . '</td>
                      <td>' . $row['full_name'] . '</td>
                      <td>' . $row['login'] . '</td>
	                  </tr>';
			}
			echo $output;

	  } else {
	  	echo 'Ничего не найдено';
	  }
	}
