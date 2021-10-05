
<?php

      $url = "https://web.njit.edu/~gec22/query.php";
      $ch = curl_init($url);
      
      $data = array('query' => $_POST['query']);
      
      $postString = http_build_query($data, '', '&');
      
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      
      $result = curl_exec($ch);
      curl_close($ch);
	
      echo $result;
?>