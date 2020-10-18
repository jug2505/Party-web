<?php

	if (!$_GET['code']){
		exit('error code');
	}

	session_start();
	include_once 'config.php';
  	require_once 'connect.php';

	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, "https://oauth.yandex.ru/token");
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_POSTFIELDS, 'grant_type=authorization_code&code=' . $_GET['code'] . '&client_id=' . ID . '&client_secret=' . SECRET);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

	$token = json_decode(curl_exec($curl), true);
	curl_close($curl);

	$data = json_decode(file_get_contents('https://login.yandex.ru/info?oauth_token=' . $token['access_token']), true);


	$check_user = $connect->prepare("SELECT * FROM `users` WHERE `login` = ? AND `password` IS NULL");
  	$check_user->bind_param('s', $data['id']);
 	$check_user->execute();
  	$result = $check_user->get_result();
  	$user = NULL;

  if ($result->num_rows > 0) {

  	$user = $result->fetch_assoc();

  } else {

  	$statement = $connect->prepare("INSERT INTO `users` (`full_name`, `login`, `email`) VALUES (?, ?, ?)");
    $statement->bind_param('sss', $data['real_name'], $data['id'], $data['default_email']);
    $statement->execute();
    $statement->close();

    $statement = $connect->prepare("SELECT * FROM `users` WHERE `login` = ? AND `password` IS NULL");
  	$statement->bind_param('s', $data['id']);
  	$statement->execute();
  	$result = $statement->get_result();
  	$user = $result->fetch_assoc();

  }

  $_SESSION['user'] = [
    "id" => $user['id'],
    "full_name" => $user['full_name'],
    "email" => $user['email']
  ];

  header('Location: ../profile.php');

?>