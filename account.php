<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>QUIZOPHILE </title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/bootstrap-theme.min.css" />
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/font.css">
  <script src="js/jquery.js" type="text/javascript"></script>


  <script src="js/bootstrap.min.js" type="text/javascript"></script>
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
  <!--alert message-->
  <?php if (@$_GET['w']) {
    echo '<script>alert("' . @$_GET['w'] . '");</script>';
  }
  ?>
  <!--alert message end-->
  <script type="text/javascript">  function preventBack() {window.history.forward();}  setTimeout("preventBack()", 0);  window.onunload = function () {null};
  function home()
{
  document.getElementById("mybtn").disabled = true;
}

</script>


<script language="javascript" type="text/javascript">
window.onload=
//Post your code
function() {
           var docElm = document.documentElement;
           if (docElm.requestFullscreen) {
               docElm.requestFullscreen();
           }
           else if (docElm.mozRequestFullScree){
               docElm.mozRequestFullScreen();
           }
           else if (docElm.webkitRequestFullScreen) {
               docElm.webkitRequestFullScreen();
           }
       }

</script>

</head>
<?php

include_once 'dbConnection.php';
?>

<body>
  <div class="header">
    <div class="row">
      <div class="col-lg-6">
        <span class="logo">QUIZOPHILE</span>
      </div>
      <div class="col-md-4 col-md-offset-2">
        <?php
        include_once 'dbConnection.php';
        session_start();
        if (!(isset($_SESSION['email']))) {
          header("location:index.php");
        } else {
          $name = $_SESSION['name'];
          $email = $_SESSION['email'];

          include_once 'dbConnection.php';
          echo '<span class="pull-right top title1" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hello,</span> <a href="account.php?q=1" class="log log1">' . $name . '</a>&nbsp;|&nbsp;<a href="logout.php?q=account.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Signout</button></a></span>';
        } ?>
      </div>
    </div>
  </div>
  <div class="bg">

    <!--navigation menu-->
    <nav class="navbar navbar-default title1">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><b>Quizophile</b></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li <?php if (@$_GET['q'] == 1) echo 'class="active"'; ?>><a id="mybtn" href="account.php?q=1"><span class="glyphicon glyphicon-home" id="mybtn" aria-hidden="true"></span>&nbsp;Home<span class="sr-only">(current)</span></a></li>
            <li <?php if (@$_GET['q'] == 2) echo 'class="active"'; ?>><a href="account.php?q=2"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;History</a></li>
            <li <?php if (@$_GET['q'] == 3) echo 'class="active"'; ?>><a href="account.php?q=3"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;Ranking</a></li>
          </ul>
          <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Enter tag ">
            </div>
            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;Search</button>
          </form>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <!--navigation menu closed-->
    <div class="container">
      <!--container start-->
      <div class="row">
        <div class="col-md-12">

          <!--home start-->
          <?php if (@$_GET['q'] == 1) {

            $result = mysqli_query($con, "SELECT * FROM quiz ORDER BY date DESC") or die('Error');
            /*echo  '<div class="panel"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>Time limit</b></td><td></td></tr>';*/
echo '<div class="panel"><table class="table table-striped title1"  style="vertical-align:middle">
<tr><td style="vertical-align:middle"><b>S.N.</b></td><td style="vertical-align:middle"><b>Name</b></td><td style="vertical-align:middle"><b>Total question</b></td><td style="vertical-align:middle"><b>Correct Answer</b></td><td style="vertical-align:middle"><b>Wrong Answer</b></td><td style="vertical-align:middle"><b>Total Marks</b></td><td style="vertical-align:middle"><b>Time limit</b></td><td style="vertical-align:middle"></td><td></td></tr>';

            $c = 1;
            while ($row = mysqli_fetch_array($result)) {
              $title = $row['title'];
              $total = $row['total'];
              $correct = $row['sahi'];
              $wrong=$row['wrong'];
              $time = $row['time'];
              $eid = $row['eid'];
              $j=$row['m_s'];
              
              $q12 = mysqli_query($con, "SELECT score FROM history WHERE eid='$eid' AND email='$email'") or die('Error98');
              $rowcount = mysqli_num_rows($q12);


              echo "<script type='text/javascript'>

function home()
{
  document.getElementById(\"mybtn\").disabled = true;
}

</script>";

              //here
              echo '<tr><td style="vertical-align:middle">' . $c++ . '</td><td style="vertical-align:middle">' . $title . '</td><td style="vertical-align:middle">' . $total . '</td><td style="vertical-align:middle">+' . $correct . '</td><td style="vertical-align:middle">-' . $wrong . '</td><td style="vertical-align:middle">' . $correct * $total . '</td><td style="vertical-align:middle">' . $time . '&nbsp;min</td>
  <td style="vertical-align:middle"><b><a href="account.php?q=quiz&step=2&eid=' . $eid . '&n=1&t=' . $total . '&m=' . $j . '" class="btn" onclick="home()" style="color:#FFFFFF;background:darkgreen;padding:7px;padding-left:10px;padding-right:10px"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span><b>Start</b></span></a></b></td></tr>
  <script> function home(){document.getElementById(\'mybtn\').disabled = true;sleep(10);}</script>
  ';
              /*if ($rowcount == 0) {
                //echo '<tr><td>' . $c++ . '</td><td>' . $title . '</td><td>' . $total . '</td><td>' . $sahi * $total . '</td><td>' . $time . '&nbsp;min</td>
	//<td><b><a href="account.php?q=quiz&step=2&eid=' . $eid . '&n=1&t=' . $total . '" class="pull-right btn sub1" style="margin:0px;background:#99cc32"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Start</b></span></a></b></td></tr>';
              
  echo '<tr><td style="vertical-align:middle">' . $c++ . '</td><td style="vertical-align:middle">' . $title . '</td><td style="vertical-align:middle">' . $total . '</td><td style="vertical-align:middle">+' . $correct . '</td><td style="vertical-align:middle">-' . $wrong . '</td><td style="vertical-align:middle">' . $correct * $total . '</td><td style="vertical-align:middle">' . $time . '&nbsp;min</td>
  <td style="vertical-align:middle"><b><a href="account.php?q=quiz&step=2&eid=' . $eid . '&n=1&t=' . $total . '&m=' . $j . '" class="btn" style="color:#FFFFFF;background:darkgreen;padding:7px;padding-left:10px;padding-right:10px"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span><b>Start</b></span></a></b></td></tr>';

              } else {
                //echo '<tr style="color:#99cc32"><td>' . $c++ . '</td><td>' . $title . '&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td><td>' . $total . '</td><td>' . $sahi * $total . '</td><td>' . $time . '&nbsp;min</td>
	//<td><b><a href="account.php?q=result&eid=' . $eid . '&n=1&t=' . $total . '" class="pull-right btn sub1" style="margin:0px;background:red"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;<span class="title1"><b>View Result</b></span></a></b></td></tr>';
              
  echo '<tr style="color:darkgreen"><td style="vertical-align:middle">' . $c++ . '</td><td style="vertical-align:middle">' . $title . '&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td><td style="vertical-align:middle">' . $total . '</td><td style="vertical-align:middle">+' . $correct . '</td><td style="vertical-align:middle">-' . $wrong . '</td><td style="vertical-align:middle">' . $correct * $total . '</td><td style="vertical-align:middle">' . $time . '&nbsp;min</td>
  <td style="vertical-align:middle"><b><a href="account.php?q=result&eid=' . $eid . '" class="btn" style="margin:0px;background:darkred;color:white";padding:7px;padding-left:10px;padding-right:10px>&nbsp;<span class="title1"><b>View Result</b></span></a></b></td></tr>';

              }*/
            }
            $c = 0;
            echo '</table></div>';
          } ?>
          <!--
<span id="countdown" class="timer"></span>
<script>
var seconds = 40;
    function secondPassed() {
    var minutes = Math.round((seconds - 30)/60);
    var remainingSeconds = seconds % 60;
    if (remainingSeconds < 10) {
        remainingSeconds = "0" + remainingSeconds; 
    }
    document.getElementById('countdown').innerHTML = minutes + ":" +    remainingSeconds;
    if (seconds == 0) {
        clearInterval(countdownTimer);
        document.getElementById('countdown').innerHTML = "Buzz Buzz";
    } else {    
        seconds--;
    }
    }
var countdownTimer = setInterval('secondPassed()', 1000);
</script>
  -->
          <!--home closed-->

          <!--quiz start-->
          <?php
          if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2 ) {
            $eid = @$_GET['eid'];
            $sn = @$_GET['n'];
            $total = @$_GET['t'];
            $m=@$_GET['m'];
            if(@$_GET['m']==0){$q = mysqli_query($con, "SELECT * FROM questions WHERE eid='$eid' AND sn='$sn' ");}
            else if(@$_GET['m']==1){$q = mysqli_query($con, "SELECT * FROM squestions WHERE eid='$eid' AND sn='$sn' ");}
            //echo '<script>document.getElementById(\'mybtn\').disabled = true;</script>';
            
            while ($row = mysqli_fetch_array($q)) {
              $qid = $row['qid'];
              if(@$_GET['m']==0){
                $q1 = mysqli_query($con, "SELECT time FROM questions WHERE qid='$qid'  ");
              }else if(@$_GET['m']==1){$q1 = mysqli_query($con, "SELECT time FROM squestions WHERE qid='$qid'  ");}

              
              $row = mysqli_fetch_array($q1);
              $time = $row['time'];
              echo $qid;
            }
            echo '<script>
var seconds = ' . $time . ' ;
function end(){
  
    window.location ="account.php?q=result&eid=' . $_GET['eid'] . '&endquiz=end";
  
}
function enable(){
  document.getElementById("sbutton").removeAttribute("disabled");

}
function frmreset(){
  document.getElementById("sbutton").setAttribute("disabled","true");
  document.getElementById("qform").reset();
}
function secondPassed() {
  
  var minutes = Math.round((seconds - 30)/60);
  var remainingSeconds = seconds % 60;
  if (remainingSeconds < 10) {
      remainingSeconds = "0" + remainingSeconds; 
  }
  document.getElementById(\'countdown\').innerHTML = minutes + ":" +    remainingSeconds;
  if (seconds <= 0) {
      clearInterval(countdownTimer);
      document.getElementById(\'countdown\').innerHTML = "Buzz Buzz...";
    //  window.location ="update.php?q=quiz&step=2&eid=' . $_GET['eid'] . '&n=' . $_GET['n'] . '&t=' . $_GET['t'] . '&endquiz=end";
    window.location ="update.php?q=quiz&step=2&eid=' . $eid . '&n=' . $sn . '&t=' . $total . '&qid=' . $qid . '&endquiz=end";
  
} 
  else {    
      seconds--;
  }
  }
var countdownTimer = setInterval(\'secondPassed()\', 1000);
</script>';


if(@$_GET['m']==0){
            echo '<form action="update.php?q=quiz&step=2&eid=' . $eid . '&n=' . $sn . '&t=' . $total . '&qid=' . $qid . '&m='.$m.'" method="POST"  class="form-horizontal">
<br />';
            //finish quiz button
            echo '<font size="3" style="margin-left:100px;font-family:\'typo\' font-size:20px; font-weight:bold;color:darkred">Time Left : </font><span class="timer btn btn-default" style="margin-left:20px;"><font style="font-family:\'typo\';font-size:20px;font-weight:bold;color:darkblue" id="countdown"></font></span><span class="timer btn btn-primary" style="margin-left:50px" onclick="end()"><span class=" glyphicon glyphicon-off"></span>&nbsp;&nbsp;<font style="font-size:12px;font-weight:bold">Finish Quiz</font></span>';


            $q = mysqli_query($con, "SELECT * FROM questions WHERE eid='$eid' AND sn='$sn' ");
            echo '<div class="panel" style="margin:5%">';
            while ($row = mysqli_fetch_array($q)) {
              $qns = $row['qns'];
              $qid = $row['qid'];
              echo '<b>Question &nbsp;' . $sn . '&nbsp;::<br />' . $qns . '</b><br /><br />';
            }
            $q = mysqli_query($con, "SELECT * FROM options WHERE qid='$qid' ");


            while ($row = mysqli_fetch_array($q)) {
              $option = $row['option'];
              $optionid = $row['optionid'];
              echo '<input type="radio" name="ans" value="' . $optionid . '">' . $option . '<br /><br />';
            }
            echo '<br /><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;Submit</button></form></div>';
            //header("location:dash.php?q=4&step=2&eid=$id&n=$total");

     }else if(@$_GET['m']==1){

          echo '<form action="shortdb.php?q=quiz&step=2&eid=' . $eid . '&n=' . $sn . '&t=' . $total . '&qid=' . $qid . '&m='.$m.'" method="POST"  class="form-horizontal">
          <br />';
                      //finish quiz button
                      echo '<font size="3" style="margin-left:100px;font-family:\'typo\' font-size:20px; font-weight:bold;color:darkred">Time Left : </font><span class="timer btn btn-default" style="margin-left:20px;"><font style="font-family:\'typo\';font-size:20px;font-weight:bold;color:darkblue" id="countdown"></font></span><span class="timer btn btn-primary" style="margin-left:50px" onclick="end()"><span class=" glyphicon glyphicon-off"></span>&nbsp;&nbsp;<font style="font-size:12px;font-weight:bold">Finish Quiz</font></span>';
          
          
                      $q = mysqli_query($con, "SELECT * FROM squestions WHERE eid='$eid' AND sn='$sn' ");
                      echo '<div class="panel" style="margin:5%">';
                      while ($row = mysqli_fetch_array($q)) {
                        $qns = $row['qns'];
                        $qid = $row['qid'];
                        echo '<b>Question &nbsp;' . $sn . '&nbsp;::<br />' . $qns . '</b><br /><br />';
                      }
                      
                        echo '<input type="text" width="50px" name="ans"  placeholder="Enter answer (space separated)"><br /><br />';
                      
                      echo '<br /><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;Submit</button></form></div>';
                      //header("location:dash.php?q=4&step=2&eid=$id&n=$total");
          


        }
        }
          //result display
          if (@$_GET['q'] == 'result' && @$_GET['eid']) {
            $eid = @$_GET['eid'];
            $q = mysqli_query($con, "SELECT * FROM history WHERE eid='$eid' AND email='$email' ") or die('Error157');
            $qt = mysqli_query($con, "SELECT * FROM quiz WHERE eid='$eid' ") or die('Error157');
            echo  '<div class="panel">
<center><h1 class="title" style="color:#660033">Result</h1><center><br /><table class="table table-striped title1" style="font-size:20px;font-weight:1000;">';
            $row2 = mysqli_fetch_array($qt);
            $qa = $row2['total'];
            while ($row = mysqli_fetch_array($q)) {
              $s = $row['score'];
              $w = $row['wrong'];
              $r = $row['sahi'];
              
              
              echo '<tr style="color:darkblue"><td>Total Questions</td><td>' . $qa . '</td></tr>
      <tr style="color:#99cc32"><td>Right Answer&nbsp;<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></td><td>' . $r . '</td></tr> 
	  <tr style="color:red"><td>Wrong Answer&nbsp;<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></td><td>' . $w . '</td></tr>
    <tr style="color:orange"><td style="vertical-align:middle">Unattempted&nbsp;<span class="glyphicon glyphicon-ban-arrow" aria-hidden="true"></span></td><td style="vertical-align:middle">' . ($qa - $r - $w) . '</td></tr>
	  <tr style="color:darkgreen"><td>Score&nbsp;<span class="glyphicon glyphicon-star" aria-hidden="true"></span></td><td>' . $s . '</td></tr>';
            
  }

            $q = mysqli_query($con, "SELECT * FROM rank WHERE  email='$email' ") or die('Error157');
            while ($row = mysqli_fetch_array($q)) {
              $s = $row['score'];
              echo '<tr style="color:#990000"><td>Overall Score&nbsp;<span class="glyphicon glyphicon-stats" aria-hidden="true"></span></td><td>' . $s . '</td></tr>';
            }
            echo '</table></div>';
            //here i copied

            echo '<tr></tr></table></div><div class="panel"><br /><h3 align="center" style="font-family:calibri">:: Detailed Analysis ::</h3><br /><ol style="font-size:20px;font-weight:bold;font-family:calibri;margin-top:20px">';
           if(@$_GET['m']==0){
            $q = mysqli_query($con, "SELECT * FROM questions WHERE eid='$_GET[eid]'") or die('Error197');
           
            while ($row = mysqli_fetch_array($q)) {
                $question = $row['qns'];
                $qid      = $row['qid'];
                $q2 = mysqli_query($con, "SELECT * FROM user_answer WHERE eid='$_GET[eid]' AND qid='$qid' AND email='$_SESSION[email]'") or die('Error197');
                if (mysqli_num_rows($q2) > 0) {
                    $row1         = mysqli_fetch_array($q2);
                    $ansid        = $row1['ans'];
                    $correctansid = $row1['correctans'];
                    $q3 = mysqli_query($con, "SELECT * FROM options WHERE optionid='$ansid'") or die('Error197');
                    $q4 = mysqli_query($con, "SELECT * FROM options WHERE optionid='$correctansid'") or die('Error197');
                    $row2       = mysqli_fetch_array($q3);
                    $row3       = mysqli_fetch_array($q4);
                    $ans        = $row2['option'];
                    $correctans = $row3['option'];
                } else {
                    $q3 = mysqli_query($con, "SELECT * FROM answer WHERE qid='$qid'") or die('Error197');
                    $row1         = mysqli_fetch_array($q3);
                    $correctansid = $row1['ansid'];
                    $q4 = mysqli_query($con, "SELECT * FROM options WHERE optionid='$correctansid'") or die('Error197');
                    $row2       = mysqli_fetch_array($q4);
                    $correctans = $row2['option'];
                    $ans        = "Unanswered";
                }
                if ($correctans == $ans && $ans != "Unanswered") {
                    echo '<li><div style="font-size:16px;font-weight:bold;font-family:calibri;margin-top:20px;background-color:lightgreen;padding:10px;word-wrap:break-word;border:2px solid darkgreen;border-radius:10px;">' . $question . ' <span class="glyphicon glyphicon-ok" style="color:darkgreen"></span></div><br />';
                    echo '<font style="font-size:14px;color:darkgreen"><b>Your Answer: </b></font><font style="font-size:14px;">' . $ans . '</font><br />';
                    echo '<font style="font-size:14px;color:darkgreen"><b>Correct Answer: </b></font><font style="font-size:14px;">' . $correctans . '</font><br />';
                } 
                else if ($ans == "Unanswered") {
                    echo '<li><div style="font-size:16px;font-weight:bold;font-family:calibri;margin-top:20px;background-color:#f7f576;padding:10px;word-wrap:break-word;border:2px solid #b75a0e;border-radius:10px;">' . $question . ' </div><br />';
                    echo '<font style="font-size:14px;color:darkgreen"><b>Correct Answer: </b></font><font style="font-size:14px;">' . $correctans . '</font><br />';
                } 
                else {
                    echo '<li><div style="font-size:16px;font-weight:bold;font-family:calibri;margin-top:20px;background-color:#f99595;padding:10px;word-wrap:break-word;border:2px solid darkred;border-radius:10px;">' . $question . ' <span class="glyphicon glyphicon-remove" style="color:red"></span></div><br />';
                    echo '<font style="font-size:14px;color:darkgreen"><b>Your Answer: </b></font><font style="font-size:14px;">' . $ans . '</font><br />';
                    echo '<font style="font-size:14px;color:red"><b>Correct Answer: </b></font><font style="font-size:14px;">' . $correctans . '</font><br />';
                    
                }
                echo "<br /></li>";
            }
          }else{$q = mysqli_query($con, "SELECT * FROM squestions WHERE eid='$_GET[eid]'") or die('Error197');
            while ($row = mysqli_fetch_array($q)) {
              $question = $row['qns'];
              $qid      = $row['qid'];
              $q2 = mysqli_query($con, "SELECT * FROM user_answer WHERE eid='$_GET[eid]' AND qid='$qid' AND email='$_SESSION[email]'") or die('Error197');
              if (mysqli_num_rows($q2) > 0) {
                  $row1         = mysqli_fetch_array($q2);
                  $ans        = $row1['ans'];
                  $q3 = mysqli_query($con, "SELECT * FROM answer WHERE qid='$qid'") or die('Error197');
                  $row2         = mysqli_fetch_array($q3);
                  $correctans = $row2['ans'];
              }else{
                $q3 = mysqli_query($con, "SELECT * FROM answer WHERE qid='$qid'") or die('Error197');
                    $row1         = mysqli_fetch_array($q3);
                    $correctans = $row1['ans'];
                    
                    $ans        = "Unanswered";
              }

              if ($correctans == $ans && $ans != "Unanswered") {
                echo '<li><div style="font-size:16px;font-weight:bold;font-family:calibri;margin-top:20px;background-color:lightgreen;padding:10px;word-wrap:break-word;border:2px solid darkgreen;border-radius:10px;">' . $question . ' <span class="glyphicon glyphicon-ok" style="color:darkgreen"></span></div><br />';
                echo '<font style="font-size:14px;color:darkgreen"><b>Your Answer: </b></font><font style="font-size:14px;">' . $ans . '</font><br />';
                echo '<font style="font-size:14px;color:darkgreen"><b>Correct Answer: </b></font><font style="font-size:14px;">' . $correctans . '</font><br />';
            } 
            else if ($ans == "Unanswered") {
                echo '<li><div style="font-size:16px;font-weight:bold;font-family:calibri;margin-top:20px;background-color:#f7f576;padding:10px;word-wrap:break-word;border:2px solid #b75a0e;border-radius:10px;">' . $question . ' </div><br />';
                echo '<font style="font-size:14px;color:darkgreen"><b>Correct Answer: </b></font><font style="font-size:14px;">' . $correctans . '</font><br />';
            } 
            else {
                echo '<li><div style="font-size:16px;font-weight:bold;font-family:calibri;margin-top:20px;background-color:#f99595;padding:10px;word-wrap:break-word;border:2px solid darkred;border-radius:10px;">' . $question . ' <span class="glyphicon glyphicon-remove" style="color:red"></span></div><br />';
                echo '<font style="font-size:14px;color:darkgreen"><b>Your Answer: </b></font><font style="font-size:14px;">' . $ans . '</font><br />';
                echo '<font style="font-size:14px;color:red"><b>Correct Answer: </b></font><font style="font-size:14px;">' . $correctans . '</font><br />';
                
            }
            echo "<br /></li>";

            }
          
          }
          }




          ?>
          <!--quiz end-->
          <?php
          //history start
          if (@$_GET['q'] == 2) {
            $q = mysqli_query($con, "SELECT * FROM history WHERE email='$email' ORDER BY date DESC ") or die('Error197');
            echo  '<div class="panel title">
<table class="table table-striped title1" >
<tr style="color:red"><td><b>S.N.</b></td><td><b>Quiz</b></td><td><b>Question Solved</b></td><td><b>Right</b></td><td><b>Wrong<b></td><td><b>Score</b></td>';
            $c = 0;
            while ($row = mysqli_fetch_array($q)) {
              $eid = $row['eid'];
              $s = $row['score'];
              $w = $row['wrong'];
              $r = $row['sahi'];
              $qa = $row['level'];
              $q23 = mysqli_query($con, "SELECT title FROM quiz WHERE  eid='$eid' ") or die('Error208');
              while ($row = mysqli_fetch_array($q23)) {
                $title = $row['title'];
              }
              $c++;
              echo '<tr><td>' . $c . '</td><td>' . $title . '</td><td>' . $qa . '</td><td>' . $r . '</td><td>' . $w . '</td><td>' . $s . '</td></tr>';
            }
            echo '</table></div>';
          }

          //ranking start
          if (@$_GET['q'] == 3) {
            $q = mysqli_query($con, "SELECT * FROM rank  ORDER BY score DESC ") or die('Error223');
            echo  '<div class="panel title">
<table class="table table-striped title1" >
<tr style="color:red"><td><b>Rank</b></td><td><b>Name</b></td><td><b>Gender</b></td><td><b>College</b></td><td><b>Score</b></td></tr>';
            $c = 0;
            while ($row = mysqli_fetch_array($q)) {
              $e = $row['email'];
              $s = $row['score'];
              $q12 = mysqli_query($con, "SELECT * FROM user WHERE email='$e' ") or die('Error231');
              while ($row = mysqli_fetch_array($q12)) {
                $name = $row['name'];
                $gender = $row['gender'];
                $college = $row['college'];
              }
              $c++;
              echo '<tr><td style="color:#99cc32"><b>' . $c . '</b></td><td>' . $name . '</td><td>' . $gender . '</td><td>' . $college . '</td><td>' . $s . '</td><td>';
            }
            echo '</table></div>';
          }
          ?>



        </div>
      </div>
    </div>
  </div>
  <!--Footer start-->
  <div class="row footer">
    <div class="col-md-3 box">
      <a href="https://mgmits.ac.in/" target="_blank">About us</a>
    </div>
    <div class="col-md-3 box">
      <a href="#" data-toggle="modal" data-target="#login">Admin Login</a>
    </div>
    <div class="col-md-3 box">
      <a href="#" data-toggle="modal" data-target="#developers">Developers</a>
    </div>
    <div class="col-md-3 box">
      <a href="feedback.php" target="_blank">Feedback</a>
    </div>
  </div>
  <!-- Modal For Developers-->
  <div class="modal fade title1" id="developers">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" style="font-family:'typo' "><span style="color:orange">Developers</span></h4>
        </div>

        <div class="modal-body">
          <p>
          <div class="row">
            <div class="col-md-4">
              <img src="image/mitslogo.jpg" width=200 height=100 alt="MITS" class="img-rounded">
            </div>
            <div class="col-md-5">
              <a href="https://www.facebook.com/mgmits.official" style="color:#202020; font-family:'typo' ; font-size:18px" title="Find on Facebook">MITS FACEBOOK</a>
              <h4 style="color:#202020; font-family:'typo' ;font-size:16px" class="title1">0484-2732111<BR>
                0484-2732100</h4>
              <h4 style="font-family:'typo' ">info@mgits.ac.in</h4>
              <h4 style="font-family:'typo' ">MUTHOOT INSTITUTE OF TECHNOLOGY AND SCIENCE,VARIKOLI</h4>
            </div>
          </div>
          </p>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <!--Modal for admin login-->
  <div class="modal fade" id="login">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title"><span style="color:orange;font-family:'typo' ">LOGIN</span></h4>
        </div>
        <div class="modal-body title1">
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <form role="form" method="post" action="admin.php?q=index.php">
                <div class="form-group">
                  <input type="text" name="uname" maxlength="20" placeholder="Admin user id" class="form-control" />
                </div>
                <div class="form-group">
                  <input type="password" name="password" maxlength="15" placeholder="Password" class="form-control" />
                </div>
                <div class="form-group" align="center">
                  <input type="submit" name="login" value="Login" class="btn btn-primary" />
                </div>
              </form>
            </div>
            <div class="col-md-3"></div>
          </div>
        </div>
        <!--<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>-->
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <!--footer end-->


</body>

</html>