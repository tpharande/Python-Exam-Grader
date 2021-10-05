<?php

    if(isset($_POST['student'])){
      $url = "https://web.njit.edu/~sk2773/getexam.php";
      $ch = curl_init($url);

      $data = array('studentid' => $_POST['student']);
      //var_dump($data);

      $postString = http_build_query($data, '', '&');

      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

      $result = curl_exec($ch);
      curl_close($ch);

      echo $result;
      }
?>