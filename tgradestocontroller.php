
<?php
  if(isset($_POST['examname']) && isset($_POST['username'])) 
     {  
        $url5 = "https://web.njit.edu/~gec22/returnresults.php";
        $ch5 = curl_init($url5);
        $examname = "exam1";
        $user = "student";
        
        $data5 = array('examname' => $_POST['examname'],'username' => $_POST['username']);
        
        $postString5 = http_build_query($data5, '', '&');
        
        curl_setopt($ch5, CURLOPT_POST, 1);
        curl_setopt($ch5, CURLOPT_POSTFIELDS, $postString5);
        curl_setopt($ch5, CURLOPT_RETURNTRANSFER, true);
        
        $result5 = curl_exec($ch5);
        curl_close($ch5);

        echo $result5;
     }
?>