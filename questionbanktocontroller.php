  
  <?php
   if(isset($_POST['qbtopic']) && isset($_POST['qbdifficulty']) && isset($_POST['qbkeyword'])) 
     { 
        $url3 = "https://web.njit.edu/~gec22/filter.php";
        $ch3 = curl_init($url3);
        
        $data3 = array('topic' => $_POST['qbtopic'],'difficulty' => $_POST['qbdifficulty'],'keyword' => $_POST['qbkeyword']);
        
        $postString3 = http_build_query($data3, '', '&');
        
        curl_setopt($ch3, CURLOPT_POST, 1);
        curl_setopt($ch3, CURLOPT_POSTFIELDS, $postString3);
        curl_setopt($ch3, CURLOPT_RETURNTRANSFER, true);
        
        $result3 = curl_exec($ch3);
        curl_close($ch3);
  	
        $response3 = json_decode($result3, true);
        echo $result3;
     }
   ?>