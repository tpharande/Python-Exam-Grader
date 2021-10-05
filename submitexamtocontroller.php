<?php
  if(isset($_POST['examname']) && isset($_POST['student']) && isset($_POST['questionids']) && isset($_POST['answers']) && isset($_POST['qpoints'])){

      $qids = explode(',',$_POST['questionids']);
   	  $answer = explode('@',urldecode($_POST['answers']));
      $points = explode(',',$_POST['qpoints']);
      $url = "https://web.njit.edu/~gec22/test.php";
      $ch = curl_init($url);
      //var_dump($_POST['answers']);
      //var_dump(explode(',',urlencode($_POST['answers'])));
      $i = 0;
      foreach($answer as $a)
      {
        $answer[$i] = urlencode($a);
        $i++;
      }
      
      $data = array('examname' => $_POST['examname'],'student' => $_POST['student'],'questionids' => $qids,'answers' => $answer,'qpoints' => $points);
      //var_dump($data);
      $postString = http_build_query($data, '', '&');

      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

      $result = curl_exec($ch);
      curl_close($ch);

      //var_dump($result);
      }
?>