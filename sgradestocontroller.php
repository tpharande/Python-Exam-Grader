<?php
      $url = "https://web.njit.edu/~gec22/studentgrades.php";
      $ch = curl_init($url);
      
      $data = array('user' => $_POST['user'],'examname' => $_POST['examname']);
      
      $postString = http_build_query($data, '', '&');
      
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      
      $result = curl_exec($ch);
      curl_close($ch);
	
      echo $result;
?>