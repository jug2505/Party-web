<?php 

require(realpath(dirname(__FILE__) . "/../database/connect.php"));
require('statfunc.php');

if (!isBot()){
  
  // Получаем IP-адрес
  $visitor_ip = getRealIP();
  // Сохраняем дату
  $date = date("Y-m-d");
  // Сохраняем агента
  $agent = $_SERVER['HTTP_USER_AGENT'];

  // Были ли посещения за сутки
  $res = mysqli_query($connect, "SELECT `visit_id` FROM `visits` WHERE `date`='$date'");

  // Если это первое посещение
  if (mysqli_num_rows($res) === 0){
    // Очищаем unique_ips
    mysqli_query($connect, "DELETE FROM `ips`");

    // Заносим IP-адрес текущего посетителя и агента
    mysqli_query($connect, "INSERT INTO `ips` (`ip_address`, `agent`) VALUES ('$visitor_ip', '$agent')");

    // Заносим в базу дату посещения и устанавливаем кол-во просмотров и уник. посещений в 1
    $res_count = mysqli_query($connect, "INSERT INTO `visits` SET `date`='$date', `hosts`=1,`views`=1");
  } else {
    // Если посещения уже сегодня были

    // Проверка, есть ли уже данный IP в базе
    $current_ip = mysqli_query($connect, "SELECT `ip_id` FROM `ips` WHERE `ip_address`='$visitor_ip'");
    // Если IP-адрес уже был (не уникальный посетитель)
    if (mysqli_num_rows($current_ip) === 1){
      // Добавляем для текущей даты +1 просмотр
      mysqli_query($connect, "UPDATE `visits` SET `views`=`views`+1 WHERE `date`='$date'");
    } else {
      // Уникальный посетитель
      
      // Заносим в базу IP-адрес этого посетителя и агента
      mysqli_query($connect, "INSERT INTO `ips` (`ip_address`, `agent`) VALUES ('$visitor_ip', '$agent')");

      // В базу visits -> +1 к уникальным и +1 к просто просмотрам 
      mysqli_query($connect, "UPDATE `visits` SET `hosts`=`hosts`+1,`views`=`views`+1 WHERE `date`='$date'");
    }
  }
}  

?>