
<?php
if(isset($_POST['examname']) && isset($_POST['questions']) && isset($_POST['points']))
     {
     	  $exam = $_POST['examname'];
     	  $questionIDs = explode(',',$_POST['questions']);
     	  $points = explode(',',$_POST['points']);
        $url4 = "https://web.njit.edu/~gec22/buildexam.php";
        $ch4 = curl_init($url4);

        $data4 = array('examname'=>$exam,'questionIDs'=>$questionIDs,'points'=>$points);


        $postString4 = http_build_query($data4, '', '&');

        curl_setopt($ch4, CURLOPT_POST, 1);
        curl_setopt($ch4, CURLOPT_POSTFIELDS, $postString4);
        curl_setopt($ch4, CURLOPT_RETURNTRANSFER, TRUE);

        $data = curl_exec($ch4);
        curl_close($ch4);
        echo $data;

 }
?>