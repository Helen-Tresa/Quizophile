<?php
session_start();

$from_time1=date('Y-m-d H:i:s');
$to_time1=$_SESSION["end_time"];

$timefirst=strtotime($from_time1);
$timesecond=strtotime($to_time1);

$differenceinseconds=$timesecond-$timefirst;
if($differenceinseconds>0)
echo gmdate("i:s",$differenceinseconds);
else if($differenceinseconds==0){echo 'stop';}


?>