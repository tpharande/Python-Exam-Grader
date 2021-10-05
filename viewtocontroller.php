
<?php
   if(isset($_POST['username']) && isset($_POST['password'])) 
   {
      $user = strtolower($_POST['username']);
      $pass = hash("haval160,4",$_POST['password']);
     
      $url = "https://web.njit.edu/~gec22/c2b2.php";
      $ch = curl_init($url);
      
      $data = array('user' => $user,'pass' => $pass);
      
      $postString = http_build_query($data, '', '&');
      
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      
      $result = curl_exec($ch);
      curl_close($ch);
	
      echo $result;
   }   
?>