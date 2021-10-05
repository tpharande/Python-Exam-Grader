
<?php
  if(isset($_POST['topic']) && isset($_POST['difficulty']) && isset($_POST['question']) && isset($_POST['functionname']) && isset($_POST['testcases']) && isset($_POST['constr']) && isset($_POST['tcnum'])) 
     { 
        $url2 = "https://web.njit.edu/~gec22/sendquestion.php";
        $ch2 = curl_init($url2);
        $testcase = explode('@',urldecode($_POST['testcases']));
        $i = 0;
        foreach($testcase as $t)
        {
          $testcase[$i] = urlencode($t);
          $i++;
        }
        
        $data2 = array('topic' => $_POST['topic'],'difficulty' => $_POST['difficulty'],'question' => $_POST['question'],
        'functionname' => $_POST['functionname'],'testcases' => $testcase,'constr' => $_POST['constr'],'testcasenum' => $_POST['tcnum']);
        //var_dump(data2);
        
        $postString2 = http_build_query($data2, '', '&');
        
        curl_setopt($ch2, CURLOPT_POST, 1);
        curl_setopt($ch2, CURLOPT_POSTFIELDS, $postString2);
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
        
        $result2 = curl_exec($ch2);
        curl_close($ch2);
  	
        echo $result2;
     }
?>