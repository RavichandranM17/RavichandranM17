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
$usn=$_POST['user'];
$sem=$_POST['pass'];
$quer="select * from res where usn='$usn' and sem='$sem';";
$res=$con->query($quer);
$rowcount=mysqli_num_rows($res);
$dq="select * from data where usn='$usn';";
$dres=$con->query($dq);
$drows=mysqli_fetch_assoc($dres);
$totalcredit=0;
if($rowcount)
{
  echo'<!DOCTYPE html>
  <html>
      <head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <title></title>
          <meta name="description" content="">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="result.css">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
      </head>
      <body>
      <div>
<table width="100%"><th><img id="logo" class="float-left" src="peslogo.jpg"/></th><th colspan="9">PES COLLEGE OF ENGINEERING, MANDYA <br> Autonomous Institute Affiliated to Visvesvaraya Technological University, Belgavi</th></table>
    </div><br>
    <table style="width:100%" align="center"class="table-bordered">
    <tr><td colspan="10" id="see" align="center">SEE RESULT</td></tr>
    <tr><td colspan="5">Name:&nbsp'.$drows['name'].'</td><td colspan="5">USN:&nbsp'.$drows['usn'].'</td></tr>
    <tr><td colspan="5">Program:&nbsp'.$drows['branch'].'</td><td colspan="5">Semester:&nbsp'.$sem.'</td></tr>
    <tr>
      <td align="center">Course Name</td>
      <td align="center">Course Code</td>
      <td align="center">Credits</td>
      <td align="center">CIE </td>
      <td align="center">SEE </td>
      <td align="center">Total Marks </td>
      <td align="center">Letter Grade </td>
      <td align="center">Grade Poits </td>
      <td align="center">Credit Points </td></tr>';
      while($rows=mysqli_fetch_assoc($res)) 
      { 
        $total=$rows['cie']+$rows['see'];
        if($total<=100&&$total>=90)
        {
          $gp=10;
          $lg='S';
        }
        if($total<90&&$total>=80)
        {
          $gp=9;
          $lg='A';
        }
        if($total<80&&$total>=70)
        {
          $gp=8;
          $lg='B';
        }
        if($total<70&&$total>=60)
        {
          $gp=7;
          $lg='C';
        }
        if($total<60&&$total>=50)
        {
          $gp=6;
          $lg='D';
        }
        if($total<50&&$total>=40)
        {
          $gp=4;
          $lg='E';
        }
        if($total<40)
        { 
        $gp=0;
        $lg='F';
      }
      $creditp=$gp*$rows['credits'];
      $totalcredit+=$creditp;
      echo'
      <tr align="center"> <td>'.$rows['cname'].'</td> 
      <td>'.$rows['ccode'].'</td> 
      <td>'.$rows['credits'].'</td> 
      <td>'.$rows['cie'].'</td>
      <td>'.$rows['see'].'</td> 
      <td>'.$total.'</td>
      <td>'.$lg.'</td>
      <td>'.$gp.'</td>
      <td>'.$creditp.'</td>
      </tr>';
      }


$sgpa=$totalcredit/25;
$cgpa=(164+192.5+224)/(23+24+25);
$cgpa=round($cgpa,2);
 echo' <tr><td align="center" colspan="5"><b>SGPA:&nbsp'.$sgpa.'</b></td>
 <td align="center" colspan="5"><b>CGPA:&nbsp'.$cgpa.'</b></td></tr></table>
      </body>
  </html>';
}
else
echo'<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <div class="alert alert-danger">
    <strong>RESULT NOT FOUND </strong>Contact Your Department<br>
    <a href="result.html">Back</a>
  </div>

</body>
</html>
'
?>
