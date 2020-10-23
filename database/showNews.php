<?php 
  require_once 'connect.php';
  $id = $_POST['id'];
  
  $res = $connect->prepare("SELECT * FROM `news` WHERE `news_id` = ? ");
  $res->bind_param('s', $id);
  $res->execute();
  $data = $res->get_result();
  $data = $data->fetch_assoc();

  $output = '<div class="container" style="text-align:center">
              <h2>' . $data['news_title'] . '</h2>
            </div>
            <!-- Текст в две колонки -->
            <div class="container">
              <div class="row">
                <div class="col-12 col-md-8" id="content">
                  <div>'. $data['news_text'] . '</div>
                </div>
                <div class="col-12 col-md-4" id="sidebar" style=""><div class="inner-wrapper-sticky" style="position: relative;">
                  <div>
                    <img src= ' . $data['picture'] . ' width="100%" height="225" style="border-radius:10px">
                  </div>
                </div>
              </div>
            </div>'; 
  
  echo $output;

?> 