<?php
$host="localhost";
$user="root";
$pass="";
$db="result";

$con= new mysqli($host,$user,$pass,$db);
if(!$con)
{
    echo "Error".mysqli.error();
}
$usn=$_POST['usn'];
$sem=$_POST['sem'];
$cname=$_POST['cname'];
$ccode=$_POST['ccode'];
$credit=$_POST['credit'];
$cie=$_POST['cie'];
$see=$_POST['see'];

$quer="INSERT INTO `res`(`usn`, `sem`, `cname`, `ccode`, `credits`, `cie`, `see`)
 VALUES ('$usn','$sem','$cname','$ccode','$credit','$cie','$see')";
$con->query($quer);
    header('Location:addres.html');
?>