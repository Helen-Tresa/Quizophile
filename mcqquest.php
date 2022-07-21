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
                        <li <?php if (@$_GET['q'] == 1) echo 'class="active"'; ?>><a href="account.php?q=1"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Home<span class="sr-only">(current)</span></a></li>
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

                   

                    <!--quiz start-->
                    <?php
                    if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2) {
                        $eid = @$_GET['eid'];
                        $sn = @$_GET['n'];
                        $total = @$_GET['t'];

                        $q = mysqli_query($con, "SELECT * FROM questions WHERE eid='$eid' AND sn='$sn' ");
                        while ($row = mysqli_fetch_array($q)) {
                            $qid = $row['qid'];
                            $q = mysqli_query($con, "SELECT time FROM questions WHERE qid='$qid'  ");
                            $row = mysqli_fetch_array($q);
                            $time = $row['time'];
                        }
                        echo '<script>
var seconds = ' . $time . ' ;
seconds*=60;
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
                        echo '<form action="update.php?q=quiz&step=2&eid=' . $eid . '&n=' . $sn . '&t=' . $total . '&qid=' . $qid . '" method="POST"  class="form-horizontal">
<br />';

                        while ($row = mysqli_fetch_array($q)) {
                            $option = $row['option'];
                            $optionid = $row['optionid'];
                            echo '<input type="radio" name="ans" value="' . $optionid . '">' . $option . '<br /><br />';
                        }
                        echo '<br /><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;Submit</button></form></div>';
                        //header("location:dash.php?q=4&step=2&eid=$id&n=$total");

                    }
                   




                    ?>
                    <!--quiz end-->
                   


                    
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