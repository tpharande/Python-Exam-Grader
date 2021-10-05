<?php
  if(isset($_POST['exam']) && isset($_POST['student']) && isset($_POST['questionid']) &&isset($_POST['functionnamec']) && 
   isset($_POST['test1c']) && isset($_POST['test2c']) && isset($_POST['teachergrade']) && isset($_POST['colon']) && isset($_POST['constraint']) && isset($_POST['comment']) && isset($_POST['test3c']) && isset($_POST['test4c']) && isset($_POST['testcasenum'])) 
     {  
        $qids = explode(',',$_POST['questionid']);
     	  $fname = explode(',',$_POST['functionnamec']);
        $tc1 = explode(',',$_POST['test1c']);
     	  $tc2 = explode(',',$_POST['test2c']);
        $tc3 = explode(',',$_POST['test3c']);
        $tc4 = explode(',',$_POST['test4c']);
        $colon = explode(',',$_POST['colon']);
        $constr = explode(',',$_POST['constraint']);
     	  $comm = explode('@',urldecode($_POST['comment']));
        $tgrade = explode(',',$_POST['teachergrade']);
        $tcnum = explode(',',$_POST['testcasenum']);
        $i = 0;
        foreach($comm as $c)
        {
          $comm[$i] = urlencode($c);
          $i++;
        }
        $url5 = "https://web.njit.edu/~gec22/updategrades.php";
        $ch5 = curl_init($url5);
        $data5 = array('exam' => $_POST['exam'],'student' => $_POST['student'],'questionid' => $qids,'functionnamec' => $fname,
        'test1c' => $tc1,'test2c' => $tc2,'test3c' => $tc3,'test4c' => $tc4,'colon' => $colon,'constr' => $constr,'comment' => $comm,'testcasenum' => $tcnum,'teachergrade' => $tgrade);
        //var_dump($data5);
        
        $postString5 = http_build_query($data5, '', '&');
        
        curl_setopt($ch5, CURLOPT_POST, 1);
        curl_setopt($ch5, CURLOPT_POSTFIELDS, $postString5);
        curl_setopt($ch5, CURLOPT_RETURNTRANSFER, true);
        
        $result5 = curl_exec($ch5);
        curl_close($ch5);
  	
        $response5 = json_decode($result5, true);
        //echo $result5;
     }
?>