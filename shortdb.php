<?php
include_once 'dbConnection.php';
session_start();
$email = $_SESSION['email'];

//remove quiz
if (isset($_SESSION['key'])) {
  if (@$_GET['q'] == 'rmquiz' && $_SESSION['key'] == 'sunny7785068889') {
    $eid = @$_GET['eid'];
    $result = mysqli_query($con, "SELECT * FROM squestions WHERE eid='$eid' ") or die('Error');
    while ($row = mysqli_fetch_array($result)) {
      $qid = $row['qid'];
      
      $r2 = mysqli_query($con, "DELETE FROM answer WHERE qid='$qid' ") or die('Error');
    }
    $r3 = mysqli_query($con, "DELETE FROM squestions WHERE eid='$eid' ") or die('Error');
    $r4 = mysqli_query($con, "DELETE FROM quiz WHERE eid='$eid' ") or die('Error');
    $r4 = mysqli_query($con, "DELETE FROM history WHERE eid='$eid' ") or die('Error');

    header("location:short.php?q=7");
  }
}


//add quiz
if (isset($_SESSION['key'])) {
  if (@$_GET['q'] == 'addquiz' && $_SESSION['key'] == 'sunny7785068889') {
    $name = $_POST['name'];
    $name = ucwords(strtolower($name));
    $total = $_POST['total'];
    $sahi = $_POST['right'];
    $wrong = $_POST['wrong'];
    $time = $_POST['time'];
    $tag = $_POST['tag'];
    $id = uniqid();
    $q3 = mysqli_query($con, "INSERT INTO quiz VALUES  ('$id','$name' , '$sahi' , '$wrong','$total','$time' ,'null','$tag', NOW(),1)");

    header("location:short.php?q=6&step=2&eid=$id&n=$total");
  }
}

//add question
if (isset($_SESSION['key'])) {
  if (@$_GET['q'] == 'addqns' && $_SESSION['key'] == 'sunny7785068889') {
    $n = @$_GET['n'];
    $eid = @$_GET['eid'];


    for ($i = 1; $i <= $n; $i++) {
      $qid = uniqid();
      $qns = $_POST['qns' . $i];
      $t = $_POST[$i . '5'];
      $q3 = mysqli_query($con, "INSERT INTO squestions VALUES  ('$eid','$qid','$qns'  , '$i','$t')");
      $ansid = uniqid();

      $a = $_POST['ans' . $i];
      $input=$_POST['input'];




      $qans = mysqli_query($con, "INSERT INTO answer VALUES  ('$qid','$ansid','$a','$input')");
    }
    header("location:dash.php?q=0");
  }
}


//quiz start
if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2) {
  $eid = @$_GET['eid'];
  $sn = @$_GET['n'];
  $m = @$_GET['m'];
  $total = @$_GET['t'];
  $ans = $_POST['ans'];

  $qid = @$_GET['qid'];
  $q = mysqli_query($con, "SELECT * FROM answer WHERE qid='$qid' ");
  while ($row = mysqli_fetch_array($q)) {
    $corans = $row['ans'];
    $input=$row['input'];
  }
  $q = mysqli_query($con, "INSERT INTO user_answer VALUES(NULL,'$eid','$qid' ,'null','$ans','$email')") or die('Error');

  //here
  $k = 0.0;
  $keyword = explode(" ", $corans);
  $userans = explode(" ", $ans); //array
  $c1 = sizeof($userans);
  $c2 = sizeof($keyword);
  for ($i = 0; $i < $c1; $i++) {
    for ($j = 0; $j < sizeof($keyword); $j++) {
      if ($userans[$i] == $keyword[$j]) {
        $k++;
      }
    }
  }
  //foreach($userans as $v){echo $v;echo '<br>';}
  // foreach($keyword as $v){echo $v;}
  //echo $k;



  if ($k == $input) {
    $q = mysqli_query($con, "SELECT * FROM quiz WHERE eid='$eid' ");
    while ($row = mysqli_fetch_array($q)) {
      $sahi = $row['sahi']; //correctanswer score
    }
    if ($sn == 1) {
      $q = mysqli_query($con, "INSERT INTO history VALUES('$email','$eid' ,'0','0','0','0',NOW())") or die('Error');
    }
    $q = mysqli_query($con, "SELECT * FROM history WHERE eid='$eid' AND email='$email' ") or die('Error115');

    while ($row = mysqli_fetch_array($q)) {
      $s = $row['score'];
      $r = $row['sahi'];
    }
    $r++;//no. of correct answers
    $s = $s + $sahi;
    $q = mysqli_query($con, "UPDATE `history` SET `score`=$s,`level`=$sn,`sahi`=$r, date= NOW()  WHERE  email = '$email' AND eid = '$eid'") or die('Error124');
  }
  //partial
  else if ($k < $input && $k > 0) {

      $q = mysqli_query($con, "SELECT * FROM quiz WHERE eid='$eid' ");
      while ($row = mysqli_fetch_array($q)) {
      $sahi = $row['sahi'];
    }
    if ($sn == 1) {
      $q = mysqli_query($con, "INSERT INTO history VALUES('$email','$eid' ,'0','0','0','0',NOW())") or die('Error');
    }
    $q = mysqli_query($con, "SELECT * FROM history WHERE eid='$eid' AND email='$email' ") or die('Error115');

    while ($row = mysqli_fetch_array($q)) {
      $s = $row['score'];
      $r = $row['sahi'];
    }
    $r++;
    (float)$newsahi = (float)(((float)$k /(float) $input) * (float)$sahi);
    (float)$s = (float)$s + (float)$newsahi;
    
    $q = mysqli_query($con, "UPDATE `history` SET `score`=$s,`level`=$sn,`sahi`=$r, date= NOW()  WHERE  email = '$email' AND eid = '$eid'") or die('Error124');
  } else {
    $q = mysqli_query($con, "SELECT * FROM quiz WHERE eid='$eid' ") or die('Error129');

    while ($row = mysqli_fetch_array($q)) {
      $wrong = $row['wrong'];
    }
    if ($sn == 1) {
      $q = mysqli_query($con, "INSERT INTO history VALUES('$email','$eid' ,'0','0','0','0',NOW() )") or die('Error137');
    }
    $q = mysqli_query($con, "SELECT * FROM history WHERE eid='$eid' AND email='$email' ") or die('Error139');
    while ($row = mysqli_fetch_array($q)) {
      $s = $row['score'];
      $w = $row['wrong'];
    }
    $w++;
    $s = $s - $wrong;
    $q = mysqli_query($con, "UPDATE `history` SET `score`=$s,`level`=$sn,`wrong`=$w, date=NOW() WHERE  email = '$email' AND eid = '$eid'") or die('Error147');
  }




  if ($sn != $total) {
    $sn++;
    header("location:account.php?q=quiz&step=2&eid=$eid&n=$sn&t=$total&m=$m") or die('Error152');
    echo "<h1>here</h1>";
  } else if ($_SESSION['key'] != 'sunny7785068889') {
   



    $q = mysqli_query($con, "SELECT score FROM history WHERE eid='$eid' AND email='$email'") or die('Error156');
    while ($row = mysqli_fetch_array($q)) {
      $s = $row['score'];
    }
    $q = mysqli_query($con, "SELECT * FROM rank WHERE email='$email'") or die('Error161');
    $rowcount = mysqli_num_rows($q);
    if ($rowcount == 0) {
      $q2 = mysqli_query($con, "INSERT INTO rank VALUES('$email','$s',NOW())") or die('Error165');
    } 
    else {
      while ($row = mysqli_fetch_array($q)) {
        $sun = $row['score'];
      }
      $sun = $s + $sun;
      $q = mysqli_query($con, "UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE email= '$email'") or die('Error174');
    }
    header("location:account.php?q=result&eid=$eid&m=$m");
  } else {
    header("location:account.php?q=result&eid=$eid&m=$m");
  }
}
?>